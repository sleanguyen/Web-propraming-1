<?php
session_start();

try {
    include 'includes/DatabaseConnection.php';

    
   $sql = 'SELECT question.id, question.text, question.date, question.img, question.userid, 
                   user.name, module.module_name AS module,
                   (SELECT COUNT(*) FROM post_like WHERE questionid = question.id) AS like_count
            FROM question 
            LEFT JOIN user ON question.userid = user.id 
            LEFT JOIN module ON question.module = module.id 
            ORDER BY question.id DESC';

    $questions = $pdo->query($sql)->fetchAll();

    $title = 'Student Questions';
    $totalQuestions = count($questions);
    
    $isAdmin = false; 

    ob_start();
    include 'templates/questions.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>