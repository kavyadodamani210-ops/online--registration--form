<?php
session_start();
require_once "db.php";

function clean($value) {
    return trim((string)$value);
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$full_name = clean($_POST["full_name"] ?? "");
$email = clean($_POST["email"] ?? "");
$phone = clean($_POST["phone"] ?? "");
$dob = clean($_POST["dob"] ?? "");
$gender = clean($_POST["gender"] ?? "");
$course = clean($_POST["course"] ?? "");
$address = clean($_POST["address"] ?? "");
$agree = isset($_POST["agree"]);

$errors = [];
if (mb_strlen($full_name) < 2 || mb_strlen($full_name) > 80) $errors[] = "Enter a name between 2 and 80 characters.";
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || mb_strlen($email) > 120) $errors[] = "Enter a valid email address.";
if (!preg_match('/^[0-9]{10}$/', $phone)) $errors[] = "Enter a valid 10-digit mobile number.";
$date = DateTime::createFromFormat("Y-m-d", $dob);
if (!$date || $date->format("Y-m-d") !== $dob || $date > new DateTime("today")) $errors[] = "Enter a valid date of birth.";
if (!in_array($gender, ["Female", "Male", "Prefer not to say"], true)) $errors[] = "Select a valid gender.";
if (!in_array($course, ["B.E. / B.Tech", "BCA", "B.Sc.", "B.Com.", "Other"], true)) $errors[] = "Select a valid course.";
if (mb_strlen($address) < 5 || mb_strlen($address) > 500) $errors[] = "Enter an address between 5 and 500 characters.";
if (!$agree) $errors[] = "Please confirm the information.";

if ($errors) {
    $_SESSION["errors"] = $errors;
    header("Location: index.php");
    exit;
}

try {
    $stmt = $pdo->prepare(
        "INSERT INTO students (full_name, email, phone, dob, gender, course, address)
         VALUES (:full_name, :email, :phone, :dob, :gender, :course, :address)"
    );
    $stmt->execute([
        ":full_name" => $full_name,
        ":email" => $email,
        ":phone" => $phone,
        ":dob" => $dob,
        ":gender" => $gender,
        ":course" => $course,
        ":address" => $address
    ]);

    $_SESSION["success"] = "Application submitted and saved successfully! Registration ID: " . $pdo->lastInsertId();
    header("Location: index.php");
    exit;
} catch (PDOException $e) {
    http_response_code(500);
    exit("Unable to save the registration. Please check your database setup and try again.");
}
