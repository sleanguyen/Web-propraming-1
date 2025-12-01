<?php
session_start();

// 1. Check if already logged in
if (isset($_SESSION['Authorised']) && $_SESSION['Authorised'] == 'Y') {
    if ($_SESSION['UserType'] == 'Admin') {
        header('Location: ../questions.php');
    } else {
        header('Location: ../../questions.php');
    }
    exit();
}

$error = '';

// 2. Process Login
if (isset($_POST['email'])) {
    
    include '../../includes/DatabaseConnection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Get role from dropdown

    try {
        // Find user matching Email AND Role
        $stmt = $pdo->prepare("SELECT * FROM user WHERE email = :email AND role = :role");
        $stmt->execute(['email' => $email, 'role' => $role]);
        $user = $stmt->fetch();

        if ($user) {
            // Check password (supports both old plain text and new hashed passwords)
            if (password_verify($password, $user['password']) || $password == $user['password']) {
                
                $_SESSION['Authorised'] = 'Y';
                $_SESSION['UserType'] = $user['role']; 
                $_SESSION['UserId'] = $user['id'];
                $_SESSION['UserName'] = $user['name'];
                
                // Use $user, not $student
                $_SESSION['UserEmail'] = $user['email']; 
                // ------------------------

                // Redirect based on Role
                if ($user['role'] == 'Admin') {
                    header('Location: ../questions.php');
                } else {
                    header('Location: ../../questions.php');
                }
                exit();

            } else {
                $error = 'Incorrect Password!';
            }
        } else {
            $error = "No account found with Email: '$email' and Role: '$role'";
        }

    } catch (PDOException $e) {
        $error = 'Database Error: ' . $e->getMessage();
    }
}

$title = 'Login Portal';
ob_start();
include '../../templates/login.html.php';
$output = ob_get_clean();
include '../../templates/login_layout.html.php';
?>