<?php
session_start();
include 'includes/DatabaseConnection.php';

// SECURITY CHECK: Only allow if logged in ('Authorised' is set)
if (isset($_SESSION['Authorised']) && $_SESSION['Authorised'] == 'Y') {
    
    // Check if form data exists
    if (isset($_POST['comment_text']) && isset($_POST['question_id'])) {
        
        $userid = $_SESSION['UserId']; // Get ID from Session
        $questionid = $_POST['question_id'];
        $text = $_POST['comment_text'];

        try {
            $stmt = $pdo->prepare("INSERT INTO comment (text, date, userid, questionid) VALUES (:text, CURDATE(), :uid, :qid)");
            $stmt->execute([
                'text' => $text,
                'uid' => $userid,
                'qid' => $questionid
            ]);
        } catch (PDOException $e) {
            // Optional: Log error
        }
    }
}

// Redirect back to questions page
header('Location: questions.php');
exit();
?>