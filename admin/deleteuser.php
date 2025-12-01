<?php
require 'login/Check.php'; // Only Admins can access
include '../includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    
    // SAFETY CHECK: Prevent Admin from deleting themselves
    // (You don't want to accidentally lock yourself out!)
    if (isset($_SESSION['UserId']) && $_POST['id'] == $_SESSION['UserId']) {
        echo "<script>alert('You cannot delete your own account!'); window.location.href='users.php';</script>";
        exit();
    }

    try {
        // Delete the user
        // Because we set up ON DELETE CASCADE in the database earlier, 
        // this will AUTOMATICALLY delete all their posts, comments, and likes too.
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