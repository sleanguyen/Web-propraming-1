<?php
// File: week9/editcomment.php
session_start();
include 'includes/DatabaseConnection.php';

// 1. Kiểm tra đăng nhập
if (!isset($_SESSION['Authorised'])) {
    die("Please login first!");
}

try {
    if (isset($_POST['text'])) {
        // --- XỬ LÝ LƯU (UPDATE) ---
        // Cập nhật comment (Chỉ khi ID khớp VÀ (là chủ sở hữu HOẶC là Admin))
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
        // --- HIỂN THỊ FORM ---
        // Lấy thông tin comment cũ
        $stmt = $pdo->prepare("SELECT * FROM comment WHERE id = :id");
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $comment = $stmt->fetch();

        // Kiểm tra quyền: Chỉ chủ nhân hoặc Admin mới được vào trang này
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