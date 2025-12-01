<?php
require 'login/Check.php';
include '../includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    try {
        $stmt = $pdo->prepare("DELETE FROM module WHERE id = :id");
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->execute();
    } catch (PDOException $e) {
        // Có thể báo lỗi nếu cần
    }
}

header('Location: modules.php');
?>