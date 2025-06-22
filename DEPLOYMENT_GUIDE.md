# Production Deployment Guide

## Pre-Deployment Checklist

### ✅ Security Requirements
- [ ] Configure environment variables (never commit `.env` files)
- [ ] Use HTTPS/SSL certificates
- [ ] Set up proper file permissions
- [ ] Configure secure database user (not root)
- [ ] Enable PHP security settings
- [ ] Set up regular backups

### ✅ Server Configuration

#### PHP Settings (php.ini)
```ini
# Security settings
expose_php = Off
display_errors = Off
log_errors = On
error_log = /var/log/php/error.log

# File upload limits
file_uploads = On
upload_max_filesize = 5M
post_max_size = 8M
max_file_uploads = 20

# Session security
session.cookie_secure = 1
session.cookie_httponly = 1
session.use_strict_mode = 1
session.cookie_samesite = "Strict"
```

#### Web Server (Apache/Nginx)

**Apache (.htaccess)**
```apache
# Security headers
Header always set X-Frame-Options DENY
Header always set X-Content-Type-Options nosniff
Header always set X-XSS-Protection "1; mode=block"
Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"

# Disable directory browsing
Options -Indexes

# Protect sensitive files
<Files ~ "^\.env">
    Order allow,deny
    Deny from all
</Files>

<Files ~ "^(composer\.(json|lock)|package\.json)$">
    Order allow,deny
    Deny from all
</Files>
```

**Nginx**
```nginx
# Security headers
add_header X-Frame-Options DENY always;
add_header X-Content-Type-Options nosniff always;
add_header X-XSS-Protection "1; mode=block" always;
add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;

# Protect sensitive files
location ~ /\.env {
    deny all;
}

location ~ \.(json|lock)$ {
    deny all;
}
```

### ✅ Database Security

1. **Create dedicated database user:**
```sql
CREATE USER 'kpsus_user'@'localhost' IDENTIFIED BY 'strong_random_password';
GRANT SELECT, INSERT, UPDATE, DELETE ON kpsus.* TO 'kpsus_user'@'localhost';
FLUSH PRIVILEGES;
```

2. **Secure MySQL installation:**
```bash
mysql_secure_installation
```

3. **Regular backups:**
```bash
# Daily backup script
mysqldump -u kpsus_user -p kpsus > /backup/kpsus_$(date +%Y%m%d).sql
```

## Deployment Steps

### 1. Server Preparation
```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install required packages
sudo apt install apache2 php php-mysql mysql-server

# Enable required PHP extensions
sudo apt install php-mbstring php-gd php-curl php-zip
```

### 2. Application Deployment
```bash
# Clone repository (or upload files)
git clone https://github.com/FaizGusion00/kpsus.git /var/www/kpsus
cd /var/www/kpsus

# Set proper ownership and permissions
sudo chown -R www-data:www-data /var/www/kpsus
sudo chmod -R 755 /var/www/kpsus
sudo chmod -R 775 images/uploads/

# Create environment file
cp .env.example .env
nano .env  # Configure with production values
```

### 3. Database Setup
```bash
# Create database
mysql -u root -p
CREATE DATABASE kpsus CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

# Import database structure
mysql -u root -p kpsus < kpsus_structure.sql

# Create admin user with hashed password
cd utils
php password_helper.php admin "admin_username" "secure_password" "A001"
# Copy the generated SQL and run it in MySQL
```

### 4. Environment Configuration

Create production `.env` file:
```env
# Production Database Configuration
DB_HOST=localhost
DB_USER=kpsus_user
DB_PASS=your_secure_database_password
DB_NAME=kpsus

# Security Settings
APP_ENV=production
DEBUG=false
SESSION_SECRET=your_64_character_random_string

# Application Settings
UPLOAD_MAX_SIZE=5242880
ALLOWED_FILE_TYPES=jpg,jpeg,png,pdf
```

### 5. Web Server Configuration

**Apache Virtual Host:**
```apache
<VirtualHost *:443>
    ServerName yourdomain.com
    DocumentRoot /var/www/kpsus
    
    SSLEngine on
    SSLCertificateFile /path/to/your/certificate.crt
    SSLCertificateKeyFile /path/to/your/private.key
    
    <Directory /var/www/kpsus>
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/kpsus_error.log
    CustomLog ${APACHE_LOG_DIR}/kpsus_access.log combined
</VirtualHost>

# Redirect HTTP to HTTPS
<VirtualHost *:80>
    ServerName yourdomain.com
    Redirect permanent / https://yourdomain.com/
</VirtualHost>
```

## Post-Deployment Security Hardening

### 1. Implement Password Hashing
Update authentication files to use `password_hash()` and `password_verify()`:

```php
// In login.php - replace plain text comparison
if (password_verify($password, $row['adminPassword'])) {
    // Login successful
}

// In registration/profile updates
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
```

### 2. Add SQL Injection Protection
Replace direct SQL queries with prepared statements:

```php
// Instead of: $sql = "SELECT * FROM admin WHERE adminUsername = '$username'";
$stmt = $conn->prepare("SELECT * FROM admin WHERE adminUsername = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
```

### 3. File Upload Security
Add file validation and restrictions:

```php
// Validate file type, size, and content
$allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
$maxSize = 5 * 1024 * 1024; // 5MB

if (!in_array($_FILES['file']['type'], $allowedTypes)) {
    die("Invalid file type");
}

if ($_FILES['file']['size'] > $maxSize) {
    die("File too large");
}
```

## Monitoring and Maintenance

### 1. Log Monitoring
```bash
# Application logs
tail -f /var/log/apache2/kpsus_error.log

# PHP error logs
tail -f /var/log/php/error.log

# System logs
tail -f /var/log/syslog
```

### 2. Security Updates
```bash
# Regular system updates
sudo apt update && sudo apt upgrade

# Monitor security advisories
# Check for PHP, MySQL, and web server updates
```

### 3. Backup Strategy
```bash
# Database backup script
#!/bin/bash
BACKUP_DIR="/backup/kpsus"
DATE=$(date +%Y%m%d_%H%M%S)

# Database backup
mysqldump -u kpsus_user -p kpsus > $BACKUP_DIR/db_$DATE.sql

# File backup
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/kpsus

# Cleanup old backups (keep 30 days)
find $BACKUP_DIR -name "*.sql" -mtime +30 -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +30 -delete
```

## Troubleshooting

### Common Issues

1. **Database Connection Errors**
   - Check `.env` file configuration
   - Verify database user permissions
   - Check MySQL service status

2. **File Upload Issues**
   - Check directory permissions (775 for uploads)
   - Verify PHP upload limits
   - Check web server configuration

3. **Session Issues**
   - Verify session directory permissions
   - Check PHP session configuration
   - Ensure proper session security settings

### Performance Optimization

1. **Enable PHP OPcache**
2. **Configure MySQL query cache**
3. **Implement CDN for static assets**
4. **Enable gzip compression**
5. **Optimize database queries**

## Security Best Practices

- Regular security audits
- Keep all software updated
- Monitor failed login attempts
- Implement rate limiting
- Use strong passwords and 2FA where possible
- Regular backup testing
- Monitor log files for suspicious activity
- Implement proper error handling (don't expose sensitive information) 