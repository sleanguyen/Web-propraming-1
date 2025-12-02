<?php
session_start();
include '../../includes/DatabaseConnection.php';

$error = '';

if (isset($_POST['submit'])) {
    try {
        // 1. get data from form
        $name = $_POST['name'];
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // 2. check if email existed
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        if ($stmt->fetchColumn() > 0) {
            $error = "This email is already registered!";
        } else {
            // 3. security

            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // 4. add in database
            $sql = "INSERT INTO user (name, email, password, role) VALUES (:name, :email, :pass, 'Student')";   
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'pass' => $hashed_password
            ]);

            // 5. register success access 
            header('Location: login.php');
            exit();
        }

    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
    }
}

// Load UI
include '../../templates/register.html.php';
?>