<?php
session_start();
include 'includes/DatabaseConnection.php';

// Chỉ cho phép người đã đăng nhập mới được Like
if (isset($_SESSION['Authorised']) && $_SESSION['Authorised'] == 'Y' && isset($_POST['question_id'])) {
    
    $userid = $_SESSION['UserId']; // Lấy ID người đang đăng nhập
    $questionid = $_POST['question_id'];

    // Kiểm tra xem đã like chưa
    $check = $pdo->prepare("SELECT * FROM post_like WHERE userid = :uid AND questionid = :qid");
    $check->execute(['uid' => $userid, 'qid' => $questionid]);

    if ($check->rowCount() > 0) {
        // Nếu đã like rồi -> Xóa (Unlike)
        $stmt = $pdo->prepare("DELETE FROM post_like WHERE userid = :uid AND questionid = :qid");
    } else {
        // Nếu chưa like -> Thêm mới (Like)
        $stmt = $pdo->prepare("INSERT INTO post_like (userid, questionid) VALUES (:uid, :qid)");
    }
    
    $stmt->execute(['uid' => $userid, 'qid' => $questionid]);
}

// Quay lại trang trước đó
header('Location: questions.php');
exit();
?>