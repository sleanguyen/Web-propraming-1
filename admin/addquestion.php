<?php
require 'login/Check.php'; // PROTECT

try {
    include '../includes/DatabaseConnection.php';

    if (isset($_POST['questiontext'])) {
        $imagePath = null;
        if (!empty($_FILES['image']['name'])) {
            $target = '../images/' . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            $imagePath = 'images/' . basename($_FILES['image']['name']);
        }

        $sql = 'INSERT INTO question (text, img, userid, module, date) VALUES (:text, :img, :userid, :module, CURDATE())';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':text' => $_POST['questiontext'],
            ':img' => $imagePath,
            ':userid' => $_POST['user'],
            ':module' => $_POST['module']
        ]);

        header('Location: questions.php');
        exit();
    }

    $users = $pdo->query('SELECT * FROM user')->fetchAll();
    $modules = $pdo->query('SELECT * FROM module')->fetchAll();

    $title = 'Add Question';
    ob_start();
    include '../templates/addquestion.html.php'; 
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'Error';
    $output = $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>