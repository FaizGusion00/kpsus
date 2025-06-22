<?php
/**
 * Password Helper Utility
 * 
 * This file provides functions to help with secure password operations.
 * Use this to generate hashed passwords for your admin accounts.
 * 
 * Usage Examples:
 * 1. Generate a hash: php password_helper.php hash "your_password"
 * 2. Verify a password: php password_helper.php verify "your_password" "stored_hash"
 */

/**
 * Generate a secure password hash
 * 
 * @param string $password The plain text password
 * @return string The hashed password
 */
function generatePasswordHash($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

/**
 * Verify a password against a hash
 * 
 * @param string $password The plain text password
 * @param string $hash The stored hash
 * @return bool True if password matches, false otherwise
 */
function verifyPassword($password, $hash) {
    return password_verify($password, $hash);
}

/**
 * Generate SQL statement for creating admin user
 * 
 * @param string $username Admin username
 * @param string $password Plain text password
 * @param string $adminId Admin ID
 * @return string SQL INSERT statement
 */
function generateAdminInsertSQL($username, $password, $adminId) {
    $hashedPassword = generatePasswordHash($password);
    $sql = "INSERT INTO admin (adminUsername, adminPassword, adminID) VALUES ";
    $sql .= "('{$username}', '{$hashedPassword}', '{$adminId}');";
    return $sql;
}

// Command line interface
if (php_sapi_name() === 'cli' && isset($argv)) {
    if (count($argv) < 2) {
        echo "Usage:\n";
        echo "  Generate hash: php password_helper.php hash <password>\n";
        echo "  Verify password: php password_helper.php verify <password> <hash>\n";
        echo "  Generate admin SQL: php password_helper.php admin <username> <password> <admin_id>\n";
        exit(1);
    }

    $action = $argv[1];

    switch ($action) {
        case 'hash':
            if (!isset($argv[2])) {
                echo "Error: Password required\n";
                exit(1);
            }
            $hash = generatePasswordHash($argv[2]);
            echo "Password hash: " . $hash . "\n";
            break;

        case 'verify':
            if (!isset($argv[2]) || !isset($argv[3])) {
                echo "Error: Password and hash required\n";
                exit(1);
            }
            $isValid = verifyPassword($argv[2], $argv[3]);
            echo $isValid ? "Password is valid\n" : "Password is invalid\n";
            break;

        case 'admin':
            if (!isset($argv[2]) || !isset($argv[3]) || !isset($argv[4])) {
                echo "Error: Username, password, and admin ID required\n";
                exit(1);
            }
            $sql = generateAdminInsertSQL($argv[2], $argv[3], $argv[4]);
            echo "SQL statement:\n" . $sql . "\n";
            break;

        default:
            echo "Unknown action: " . $action . "\n";
            exit(1);
    }
}
?> 