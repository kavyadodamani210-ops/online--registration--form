<?php
// Database connection settings for XAMPP.
$host = "localhost";
$dbname = "online_registration";
$username = "root";
$password = ""; // Default XAMPP MySQL password is usually blank.

try {
    $pdo = new PDO(
        "mysql:host=$host;port=3307;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    exit("Database connection failed. Check that MySQL is running and database.sql has been imported.");
}
