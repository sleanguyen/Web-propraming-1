<?php
require 'login/Check.php';
include '../includes/DatabaseConnection.php';

try {
    // --- XỬ LÝ KHI BẤM SAVE ---
    if (isset($_POST['submit'])) {
        
        if (!empty($_POST['id'])) {
            // Cập nhật (Update)
            $sql = "UPDATE module SET module_name = :name WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['module_name']);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();
        } else {
            // Thêm mới (Insert)
            $sql = "INSERT INTO module (module_name) VALUES (:name)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['module_name']);
            $stmt->execute();
        }

        header('Location: modules.php');
        exit();
    } 
    
    // --- HIỂN THỊ FORM ---
    else {
        // Nếu có ID trên URL -> Lấy dữ liệu cũ để sửa
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM module WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_GET['id']);
            $stmt->execute();
            $module = $stmt->fetch();
        } else {
            // Nếu không có ID -> Form trống (Thêm mới)
            $module = ['id' => '', 'module_name' => ''];
        }

        $title = 'Edit Module';
        ob_start();
        include '../templates/editmodule.html.php';
        $output = ob_get_clean();
    }

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>