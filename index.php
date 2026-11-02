<?php
session_start();
$success = $_SESSION["success"] ?? "";
unset($_SESSION["success"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Online Registration Form</title>
<link rel="stylesheet" href="style.css">
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
<header class="site-header">
    <div class="brand">Student<span>Portal</span></div>
    <p>Online Application &amp; Registration</p>
    <nav><a class="nav-link active" href="index.php">Register</a><a class="nav-link" href="view_students.php">View Registered Students</a></nav>
</header>
<main class="container">
<section class="form-card">
    <div class="form-heading">
        <div class="icon">✦</div>
        <h1>Registration Form</h1>
        <p>Please fill in your details to submit your application.</p>
    </div>
    <?php if ($success): ?>
        <div class="notice success-notice"><?= htmlspecialchars($success, ENT_QUOTES, 'UTF-8') ?></div>
    <?php endif; ?>
    <form id="registrationForm" action="submit.php" method="POST" novalidate>
        <div class="section-title">Personal Information</div>
        <div class="form-grid">
            <div class="field full">
                <label for="full_name">Full Name <span>*</span></label>
                <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required maxlength="80">
                <small class="error"></small>
            </div>
            <div class="field">
                <label for="email">Email Address <span>*</span></label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required maxlength="120">
                <small class="error"></small>
            </div>
            <div class="field">
                <label for="phone">Mobile Number <span>*</span></label>
                <input type="tel" id="phone" name="phone" placeholder="10-digit mobile number" required maxlength="10">
                <small class="error"></small>
            </div>
            <div class="field">
                <label for="dob">Date of Birth <span>*</span></label>
                <input type="date" id="dob" name="dob" required>
                <small class="error"></small>
            </div>
            <div class="field">
                <label for="gender">Gender <span>*</span></label>
                <select id="gender" name="gender" required>
                    <option value="">Select gender</option>
                    <option>Female</option><option>Male</option><option>Prefer not to say</option>
                </select>
                <small class="error"></small>
            </div>
            <div class="field full">
                <label for="course">Applying For <span>*</span></label>
                <select id="course" name="course" required>
                    <option value="">Select a course</option>
                    <option>B.E. / B.Tech</option><option>BCA</option><option>B.Sc.</option><option>B.Com.</option><option>Other</option>
                </select>
                <small class="error"></small>
            </div>
            <div class="field full">
                <label for="address">Address <span>*</span></label>
                <textarea id="address" name="address" rows="3" placeholder="Enter your full address" required maxlength="500"></textarea>
                <small class="error"></small>
            </div>
        </div>
        <label class="agree"><input type="checkbox" id="agree" name="agree" value="yes"><span>I confirm that the information provided above is correct.</span></label>
        <small class="error agree-error"></small>
        <button type="submit" class="submit-btn">Submit Application <span>→</span></button>
        <p class="required-note">Fields marked with * are required.</p>
    </form>
</section>
<footer>© 2026 StudentPortal · Online Registration System</footer>
</main>
<script src="script.js"></script>
</body>
</html>
