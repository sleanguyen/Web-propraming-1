<?php
require 'login/Check.php'; 

try {
    include '../includes/DatabaseConnection.php';

    $sql = 'SELECT question.id, question.text, question.date, question.img, question.userid, -- THÊM userid Ở ĐÂY
                   user.name, module.module_name AS module,
                   (SELECT COUNT(*) FROM post_like WHERE questionid = question.id) AS like_count
            FROM question 
            LEFT JOIN user ON question.userid = user.id 
            LEFT JOIN module ON question.module = module.id 
            ORDER BY question.id DESC';

    $questions = $pdo->query($sql)->fetchAll();

    $title = 'Manage Questions';
    $totalQuestions = count($questions);
    
    $isAdmin = true; 

    ob_start();
    include '../templates/questions.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>