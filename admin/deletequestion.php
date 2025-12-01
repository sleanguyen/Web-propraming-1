<?php
require 'login/Check.php'; // PROTECT
include '../includes/DatabaseConnection.php';

if (isset($_POST['id'])) {
    $stmt = $pdo->prepare('DELETE FROM question WHERE id = :id');
    $stmt->execute([':id' => $_POST['id']]);
}
header('Location: questions.php');
?>