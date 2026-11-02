CREATE DATABASE IF NOT EXISTS online_registration
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE online_registration;

CREATE TABLE IF NOT EXISTS students (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(80) NOT NULL,
    email VARCHAR(120) NOT NULL,
    phone CHAR(10) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(30) NOT NULL,
    course VARCHAR(50) NOT NULL,
    address VARCHAR(500) NOT NULL,
    registered_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
