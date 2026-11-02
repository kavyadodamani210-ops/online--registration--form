<?php
$database_url = getenv("DATABASE_URL");

if (!$database_url) {
    die("Database connection string is missing.");
}

$url = parse_url($database_url);

$host = $url["host"];
$port = $url["port"] ?? 3306;
$dbname = ltrim($url["path"], "/");
$username = $url["user"];
$password = $url["pass"];

try {
    $pdo = new PDO(
        "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    exit("Database connection failed.");
}
?>
