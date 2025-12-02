<?php
session_start();

if (!isset($_SESSION['UserType']) || $_SESSION['UserType'] != 'Admin') {
    die('Access Denied');
}

include '../includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM comment WHERE id = :id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        
        if (isset($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
        } else {
            header("Location: questions.php");
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>