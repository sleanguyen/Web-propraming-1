<?php
require 'login/Check.php'; // Only Admins can access
include '../includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    

    if (isset($_SESSION['UserId']) && $_POST['id'] == $_SESSION['UserId']) {
        echo "<script>alert('You cannot delete your own account!'); window.location.href='users.php';</script>";
        exit();
    }

    try {
        // Delete the user
        $stmt = $pdo->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();

    } catch (PDOException $e) {
        echo 'Database Error: ' . $e->getMessage();
        exit();
    }
}

// Redirect back to the list
header('Location: users.php');
exit();
?>