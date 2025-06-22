# KPSU Management System

A web-based management system for KPSU (Student Organization) built with PHP and MySQL.

## Features

- Admin Dashboard
- Member Management
- Event Management
- Fees Management
- User Authentication with Role-based Access (Admin, Member, Ex-Member)
- Profile Management
- File Upload Functionality

## Security Notice

This application has been configured for safe public distribution. All sensitive information has been removed or moved to environment variables.

## Installation & Setup

### Prerequisites

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (optional, for dependency management)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/FaizGusion00/kpsus.git
   cd kpsus
   ```

2. **Database Setup**
   ```bash
   # Create a new MySQL database
   mysql -u root -p
   CREATE DATABASE kpsus;
   ```

3. **Import Database Structure**
   ```bash
   mysql -u root -p kpsus < kpsus_structure.sql
   ```

4. **Environment Configuration**
   ```bash
   # Copy the example environment file
   cp .env.example .env
   
   # Edit .env with your database credentials
   nano .env
   ```

5. **Create Admin User**
   
   You need to manually create an admin user with a hashed password:
   ```sql
   -- Replace 'your_secure_password_hash' with an actual hashed password
   INSERT INTO admin (adminUsername, adminPassword, adminID) 
   VALUES ('admin', 'your_secure_password_hash', 'A001');
   ```

   To generate a password hash in PHP:
   ```php
   echo password_hash('your_password', PASSWORD_DEFAULT);
   ```

6. **Set Permissions**
   ```bash
   # Make sure uploads directory is writable
   chmod 755 images/uploads/
   ```

7. **Configure Web Server**
   
   Point your web server document root to the project directory.

## Configuration

### Environment Variables

Create a `.env` file based on `.env.example` and configure:

- `DB_HOST`: Database host (usually localhost)
- `DB_USER`: Database username
- `DB_PASS`: Database password
- `DB_NAME`: Database name (kpsus)

### Security Considerations

1. **Password Hashing**: Implement password hashing for user passwords
2. **File Upload Security**: Validate file types and sizes
3. **SQL Injection**: Use prepared statements for database queries
4. **Session Security**: Implement proper session management
5. **HTTPS**: Use HTTPS in production

## Usage

1. Access the application through your web browser
2. Use the login page at `/pages/authentication/login.php`
3. Create an admin account first, then manage members and events

## File Structure

```
kpsus/
├── pages/           # Application pages
│   ├── admin/       # Admin panel pages
│   ├── member/      # Member pages
│   ├── ex_member/   # Ex-member pages
│   └── authentication/ # Login/logout pages
├── css/             # Stylesheets
├── js/              # JavaScript files
├── images/          # Image assets and uploads
├── vendors/         # Third-party libraries
├── db_connect.php   # Database connection
└── README.md        # This file
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## Security Reporting

If you discover any security vulnerabilities, please send an email to the maintainer rather than opening a public issue.

## License

This project is open source. Please check the license file for more details.

## Disclaimer

This system is provided as-is. Please ensure you implement proper security measures before deploying to production, including:

- Regular security updates
- Proper authentication mechanisms
- Input validation and sanitization
- File upload restrictions
- Database security measures 