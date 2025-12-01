<?php
require 'login/Check.php'; // Admin Access Only
include '../includes/DatabaseConnection.php';

try {
    // --- CASE 1: HANDLE FORM SUBMISSION (POST) ---
    if (isset($_POST['submit'])) {
        
        // 1. Check if Admin provided a new password
        if (!empty($_POST['password'])) {
            // IF PASSWORD IS SET: Update Name, Email AND Password
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $sql = 'UPDATE user SET name = :name, email = :email, password = :password WHERE id = :id';
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':password', $password);
        } else {
            // IF PASSWORD IS BLANK: Update ONLY Name and Email (Keep old password)
            $sql = 'UPDATE user SET name = :name, email = :email WHERE id = :id';
            $stmt = $pdo->prepare($sql);
        }

        // 2. Bind common values
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->bindValue(':email', $_POST['email']);
        $stmt->bindValue(':id', $_POST['id']);

        // 3. Execute
        $stmt->execute();

        // 4. Redirect
        header('Location: users.php?msg=success');
        exit();
    } 
    
    // --- CASE 2: SHOW FORM (GET) ---
    else if (isset($_GET['id'])) {
        $sql = 'SELECT * FROM user WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $user = $stmt->fetch();

        if (!$user) {
            die('User not found!');
        }

        $title = 'Edit Student';
        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    } 
    else {
        header('Location: users.php');
        exit();
    }

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>