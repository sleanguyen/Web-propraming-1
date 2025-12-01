<?php
session_start();
include 'includes/MailService.php'; // Include Mail Logic

// Check Login
if (!isset($_SESSION['Authorised'])) {
    header('Location: admin/login/login.php');
    exit();
}

$message = '';

if (isset($_POST['send_help'])) {
    // Get current user info from Session (don't trust form input for sender)
    $fromEmail = $_SESSION['UserEmail'] ?? 'student@forum.com'; // You might need to save email in session during login
    $fromName  = $_SESSION['UserName'];
    
    $subject = $_POST['subject'];
    $msgBody = $_POST['message'];

    // Send Email
    $result = sendContactEmail($fromEmail, $fromName, $subject, $msgBody);

    if ($result === true) {
        $message = "<div style='color: green; background: #d4edda; padding: 10px; border-radius: 5px;'>✅ Request sent to Admin successfully!</div>";
    } else {
        $message = "<div style='color: red; background: #f8d7da; padding: 10px; border-radius: 5px;'>❌ Error: $result</div>";
    }
}

$title = "Help & Support";
ob_start();
include 'templates/help.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';
?>