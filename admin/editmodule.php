<?php
require 'login/Check.php';
include '../includes/DatabaseConnection.php';

try {
    if (isset($_POST['submit'])) {
        
        if (!empty($_POST['id'])) {
            $sql = "UPDATE module SET module_name = :name WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['module_name']);
            $stmt->bindValue(':id', $_POST['id']);
            $stmt->execute();
        } else {
            $sql = "INSERT INTO module (module_name) VALUES (:name)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':name', $_POST['module_name']);
            $stmt->execute();
        }

        header('Location: modules.php');
        exit();
    } 
    
    else {
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM module WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':id', $_GET['id']);
            $stmt->execute();
            $module = $stmt->fetch();
        } else {
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