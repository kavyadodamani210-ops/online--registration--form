<?php
require_once "db.php";

$search = trim($_GET["search"] ?? "");
if ($search !== "") {
    $stmt = $pdo->prepare(
        "SELECT id, full_name, email, phone, dob, gender, course, address, registered_at
         FROM students
         WHERE full_name LIKE :search OR phone LIKE :search OR email LIKE :search
         ORDER BY id DESC"
    );
    $stmt->execute([":search" => "%" . $search . "%"]);
} else {
    $stmt = $pdo->query(
        "SELECT id, full_name, email, phone, dob, gender, course, address, registered_at
         FROM students ORDER BY id DESC"
    );
}
$students = $stmt->fetchAll();

function h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, "UTF-8");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registered Students</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
    <div class="brand">Student<span>Portal</span></div>
    <p>Online Application &amp; Registration</p>
    <nav><a class="nav-link" href="index.php">Register</a><a class="nav-link active" href="view_students.php">View Registered Students</a></nav>
</header>
<main class="container wide">
<section class="form-card">
    <div class="list-heading">
        <div><h1>Registered Students</h1><p>Previously submitted applications saved in the database.</p></div>
        <div class="count-box"><strong><?= count($students) ?></strong><span>Record(s) shown</span></div>
    </div>
    <form class="search-form" method="GET" action="view_students.php">
        <input type="search" name="search" value="<?= h($search) ?>" placeholder="Search by student name, email or mobile number">
        <button type="submit">Search</button>
        <?php if ($search !== ""): ?><a class="clear-link" href="view_students.php">Clear</a><?php endif; ?>
    </form>
    <?php if (!$students): ?>
        <div class="empty-state"><div class="empty-icon">▤</div><h2>No student records found</h2><p>Register a student first, or try a different search.</p><a class="action-link" href="index.php">Go to Registration Form</a></div>
    <?php else: ?>
        <div class="table-wrap">
        <table>
            <thead><tr><th>ID</th><th>Student Name</th><th>Email</th><th>Mobile</th><th>Date of Birth</th><th>Gender</th><th>Course</th><th>Address</th><th>Registered On</th></tr></thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= h($student["id"]) ?></td><td><?= h($student["full_name"]) ?></td>
                    <td><?= h($student["email"]) ?></td><td><?= h($student["phone"]) ?></td>
                    <td><?= h($student["dob"]) ?></td><td><?= h($student["gender"]) ?></td>
                    <td><?= h($student["course"]) ?></td><td><?= h($student["address"]) ?></td>
                    <td><?= h($student["registered_at"]) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        </div>
        <div class="list-actions"><button type="button" onclick="window.print()">Print Student List</button><a class="action-link" href="index.php">Add New Registration</a></div>
    <?php endif; ?>
</section>
<footer>© 2026 StudentPortal · Online Registration System</footer>
</main>
</body>
</html>
