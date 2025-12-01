<?php
$isInLoginFolder = (basename(dirname($_SERVER['PHP_SELF'])) == 'login');
if ($isInLoginFolder) { $rootPath = '../../'; $adminPath = '../'; } 
else { $rootPath = '../'; $adminPath = ''; }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <style>
        /* CSS nhúng */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, Helvetica, Sans-serif; background-color: #f0f2f5; color: #333; }
        header#admin { background-color: #3cbc8d; padding: 20px; border-bottom: 5px solid #757575; color: white; text-align: center; }
        h1 { font-weight: normal; margin: 0; }
        nav { background-color: #443A5C; }
        nav ul { list-style-type: none; text-align: center; margin: 0; padding: 0; display: flex; justify-content: center; }
        nav li { padding: 15px 20px; }
        nav a { color: white; text-decoration: none; font-weight: bold; font-size: 1.1em; }
        nav a:hover { color: #ddd; text-decoration: underline; }
        main { max-width: 1200px; margin: 30px auto; padding: 20px; min-height: 400px; }
        footer { padding: 1em; background-color: #FFC9A7; font-size: 0.9em; text-align: center; margin-top: 20px; }
        .user-table, .module-table { width: 100%; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .user-table th, .user-table td { padding: 12px; border-bottom: 1px solid #ddd; }
        .user-table th { background-color: #3cbc8d; color: white; }
    </style>
  </head>
  <body> 
    
    <header id="admin">
      <h1>Student Forum – ADMIN AREA</h1>
    </header>

    <nav>
      <ul>
        <li><a href="<?= $rootPath ?>index.php">🌍 Public Home</a></li>
        
        <li><a href="<?= $adminPath ?>questions.php">Manage Questions</a></li>
        <li><a href="<?= $adminPath ?>addquestion.php">Add Question</a></li>
        <li><a href="<?= $adminPath ?>users.php">Manage Users</a></li>
        <li><a href="<?= $adminPath ?>modules.php">Manage Modules</a></li>

        <li><a href="<?= $adminPath ?>login/Logout.php" style="color: #ff6b6b;">Log out</a></li>
      </ul>
    </nav>

    <main>
      <?= $output ?>
    </main>

    <footer>
      &copy; Admin System 2025
    </footer>
  </body>
</html>