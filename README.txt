ONLINE REGISTRATION FORM WITH MYSQL DATABASE
==============================================

PROJECT FEATURES
1. Online student registration form.
2. HTML, CSS, JavaScript, jQuery and PHP.
3. Client-side and server-side validation.
4. MySQL database stores submitted student details.
5. View previously registered students.
6. Search students by name, email or mobile number.
7. Print the registered students list.

REQUIREMENTS
- XAMPP installed on Windows.
- Apache and MySQL services.
- Web browser.
- Internet connection to load jQuery from its CDN.

INSTALLATION - FOLLOW THESE STEPS
1. Extract the ZIP file.
2. Copy the folder "Online_Registration_With_Database".
3. Paste it inside C:\xampp\htdocs\
4. Open XAMPP Control Panel.
5. Click Start for Apache.
6. Click Start for MySQL.
7. Open this address in Chrome:
   http://localhost/phpmyadmin/
8. In phpMyAdmin, click the Import tab.
9. Click Choose File and select database.sql from this project folder.
10. Click Import (or Go). The database online_registration and table students will be created.
11. Open the project:
    http://localhost/Online_Registration_With_Database/
12. Fill in the form and click Submit Application.
13. To see saved student records, click "View Registered Students" in the navigation menu.

IMPORTANT
- MySQL must be running for registration and the student list to work.
- Apache and MySQL must both show Running in XAMPP.
- The default XAMPP MySQL username is root and password is blank. If your MySQL password is different, edit db.php.
- Do not open PHP files by double-clicking them. Use the localhost address.
- jQuery loads from its CDN, so an internet connection is needed for the client-side jQuery validation.
- For real public cloud hosting, use a PHP-compatible host and a MySQL database. Localhost is for development and practical demonstration.
- The form stores student details on your local MySQL database; this ZIP does not automatically upload data to an internet server.
