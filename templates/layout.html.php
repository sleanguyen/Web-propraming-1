<?php
// Ensure session is started to check login status
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="question.css">
    <title><?= $title ?></title>
    <style>
        /* --- CSS STYLES --- */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Times New Roman, Helvetica, Sans-serif; background-color: #f0f2f5; color: #333; }
        header { background-color: #3cbc8d; padding: 20px; border-bottom: 5px solid #757575; color: white; text-align: center; }
        h1 { font-weight: normal; margin: 0; padding: 10px; }
        nav { background-color: #443A5C; }
        nav ul { list-style-type: none; text-align: center; margin: 0; padding: 0; display: flex; justify-content: center; align-items: center; }
        nav li { padding: 15px 20px; }
        nav a { color: white; text-decoration: none; font-weight: bold; font-size: 1.1em; }
        nav a:hover { color: #ddd; text-decoration: underline; }
        main { max-width: 1000px; margin: 30px auto; padding: 20px; background-color: white; min-height: 400px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        footer { padding: 1em; background-color: #FFC9A7; font-size: 0.9em; text-align: center; margin-top: 20px; }
        
        .btn-logout { background-color: #d32f2f; padding: 8px 15px; border-radius: 4px; font-size: 0.9em; transition: 0.3s; }
        .btn-logout:hover { background-color: #b71c1c; text-decoration: none; }
        .btn-admin-panel { background-color: #f1c40f; color: #333 !important; padding: 8px 15px; border-radius: 4px; font-size: 0.9em; margin-right: 10px; }
        .btn-admin-panel:hover { background-color: #d4ac0d; text-decoration: none; }

        .feed-container { max-width: 700px; margin: 0 auto; }
        .question-card { background: #fff; border: 1px solid #ddd; border-radius: 8px; margin-bottom: 20px; padding: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05); }
        .card-header { border-bottom: 1px solid #eee; padding-bottom: 10px; margin-bottom: 10px; }
        .username { font-weight: bold; color: #2c3e50; font-size: 1.1em; }
        .sub-info { font-size: 0.85em; color: #7f8c8d; }
        .module-badge { background-color: #e0f7fa; color: #006064; padding: 2px 6px; border-radius: 4px; font-weight: bold; }
        .card-image img { max-width: 100%; height: auto; border-radius: 4px; margin-top: 10px; }
    </style>
</head>
<body>
    <header>
        <h1>Student Forum (Public Area)</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="questions.php">View Questions</a></li>
            
            <?php if (isset($_SESSION['Authorised']) && $_SESSION['Authorised'] == 'Y'): ?>
                
                <li><a href="addquestion.php">Add Question</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="help.php">Help</a></li>

                <?php if (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Admin'): ?>
                    <li>
                        <a href="admin/questions.php" class="btn-admin-panel">⚙️ Admin Panel</a>
                    </li>
                <?php endif; ?>

                <li>
                    <a href="admin/login/Logout.php" class="btn-logout">
                        Logout (<?= htmlspecialchars($_SESSION['UserName'] ?? 'User') ?>)
                    </a>
                </li>

            <?php else: ?>
                <li><a href="admin/login/login.php">Login</a></li>
            <?php endif; ?>
            
        </ul>
    </nav>
    <main>
        <?= $output ?>
    </main>
    <footer>&copy; Student Forum 2025</footer>
</body>
</html>