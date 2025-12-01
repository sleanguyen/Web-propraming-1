<?php
// ... (Các phần session_start/require Check.php giữ nguyên) ...
require 'login/Check.php';
include '../includes/DatabaseConnection.php';

try {
    if (isset($_POST['questionid'])) {
        // ... (Code Update giữ nguyên) ...
        $sql = 'UPDATE question SET text = :text, module = :module WHERE id = :id';
        // ...
        // ...
    } elseif (isset($_GET['id'])) {
        // --- LẤY DỮ LIỆU CÂU HỎI ---
        $sql = 'SELECT * FROM question WHERE id = :id';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $_GET['id']);
        $stmt->execute();
        $question = $stmt->fetch();

        // --- BẢO MẬT: KIỂM TRA QUYỀN SỬA ---
        $isOwner = ($_SESSION['UserId'] == $question['userid']);
        $isAdmin = ($_SESSION['UserType'] == 'Admin');

        // Nếu không phải Admin VÀ không phải chủ bài viết -> Chặn
        if (!$isAdmin && !$isOwner) {
            die("Access Denied! You can only edit your own questions.");
        }
        // ------------------------------------

        $modules = $pdo->query('SELECT * FROM module')->fetchAll();

        $title = 'Edit question';
        ob_start();
        include '../templates/editquestion.html.php';
        $output = ob_get_clean();
    } else {
        header('Location: questions.php');
        exit();
    }
} catch (Exception $e) {
    $title = 'Error editing question';
    $output = 'Error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
?>