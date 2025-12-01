<?php
session_start();
include 'includes/DatabaseConnection.php';

if (!isset($_SESSION['Authorised'])) {
    header('Location: admin/login/login.php');
    exit();
}

$message = '';
$userId = $_SESSION['UserId'];

// 1. UPDATE NAME
if (isset($_POST['update_profile'])) {
    $newName = $_POST['name'];
    $stmt = $pdo->prepare("UPDATE user SET name = :name WHERE id = :id");
    $stmt->execute(['name' => $newName, 'id' => $userId]);
    $_SESSION['UserName'] = $newName;
    $message = "✅ Profile updated successfully!";
}

// 2. FETCH USER INFO
$stmt = $pdo->prepare("SELECT * FROM user WHERE id = :id");
$stmt->execute(['id' => $userId]);
$user = $stmt->fetch();

// 3. FETCH POSTS (With Like Count)
// Added the subquery to count likes
$sql = "SELECT question.*, module.module_name,
               (SELECT COUNT(*) FROM post_like WHERE questionid = question.id) AS like_count
        FROM question 
        LEFT JOIN module ON question.module = module.id 
        WHERE userid = :uid 
        ORDER BY date DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute(['uid' => $userId]);
$myQuestions = $stmt->fetchAll();

$title = "My Profile & Posts";
ob_start();
include 'templates/profile.html.php';
$output = ob_get_clean();

include 'templates/layout.html.php';
?>