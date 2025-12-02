<?php
session_start();
include 'includes/DatabaseConnection.php';

// check log in
if (!isset($_SESSION['Authorised'])) {
    die("Please login first!");
}

try {
    if (isset($_POST['text'])) {
        $sql = "UPDATE comment SET text = :text 
                WHERE id = :id AND (userid = :uid OR :isAdmin = 'Admin')";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':text', $_POST['text']);
        $stmt->bindValue(':id', $_POST['id']);
        $stmt->bindValue(':uid', $_SESSION['UserId']);
        $stmt->bindValue(':isAdmin', $_SESSION['UserType'] ?? '');
        
        $stmt->execute();
        
        header('Location: questions.php');
        exit();

    } else if (isset($_GET['id'])) {
        $stmt = $pdo->prepare("SELECT * FROM comment WHERE id = :id");
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $comment = $stmt->fetch();

        $isOwner = ($comment['userid'] == $_SESSION['UserId']);
        $isAdmin = (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Admin');

        if (!$isOwner && !$isAdmin) {
            die("Access Denied! You can only edit your own comments.");
        }

        $title = "Edit Comment";
        ob_start();
        include 'templates/editcomment.html.php';
        $output = ob_get_clean();
        
        include 'templates/layout.html.php';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>