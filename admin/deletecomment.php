<?php
// File: week9/admin/deletecomment.php
session_start();

// 1. Kiểm tra quyền Admin (Chỉ Admin mới được xóa comment)
if (!isset($_SESSION['UserType']) || $_SESSION['UserType'] != 'Admin') {
    die('Access Denied');
}

include '../includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    try {
        // 2. Xóa comment dựa trên ID
        $stmt = $pdo->prepare("DELETE FROM comment WHERE id = :id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
        
        // 3. Quay lại trang trước đó (Admin hoặc Public)
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