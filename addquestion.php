<?php
session_start(); // Ensure session is started

// Security Check: Must be logged in to post
if (!isset($_SESSION['Authorised'])) {
    die("Please login to post a question.");
}

try {
    include 'includes/DatabaseConnection.php';

    if (isset($_POST['questiontext'])) {
        
        // Handle Image Upload
        $imagePath = null;
        if (!empty($_FILES['image']['name']) && $_FILES['image']['error'] == 0) {
            $fileName = basename($_FILES['image']['name']);
            $targetPath = 'images/' . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $imagePath = 'images/' . $fileName;
            }
        }

        // --- IMPORTANT CHANGE HERE ---
        // We do NOT use $_POST['user'] anymore.
        // We use $_SESSION['UserId'] to get the logged-in user's ID.
        
        $sql = 'INSERT INTO question (text, img, date, userid, module) 
                VALUES (:text, :img, CURDATE(), :userid, :module)';
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':text', $_POST['questiontext']);
        $stmt->bindValue(':img', $imagePath);
        
        // Use the ID from the Session (Secure)
        $stmt->bindValue(':userid', $_SESSION['UserId']); 
        
        $stmt->bindValue(':module', $_POST['module']);
        $stmt->execute();

        header('Location: questions.php');
        exit();
    }

    // Only fetch Modules (We don't need the list of users anymore)
    $modules = $pdo->query('SELECT * FROM module')->fetchAll();

    $title = 'Add a Question';
    
    ob_start();
    include 'templates/addquestion.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>