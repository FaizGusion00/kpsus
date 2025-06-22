<?php 
// Database configuration using environment variables for security
// For production, set these environment variables on your server
$db_host = $_ENV['DB_HOST'] ?? getenv('DB_HOST') ?: 'localhost';
$db_user = $_ENV['DB_USER'] ?? getenv('DB_USER') ?: 'your_db_user';
$db_pass = $_ENV['DB_PASS'] ?? getenv('DB_PASS') ?: 'your_db_password';
$db_name = $_ENV['DB_NAME'] ?? getenv('DB_NAME') ?: 'kpsus';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
?>