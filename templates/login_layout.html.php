<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../question.css">
    
    <style>
        body {
            font-family: Arial, Helvetica, Sans-serif;
            background-color: #f0f2f5; 
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        .login-brand {
            text-align: center;
            padding: 30px 0;
            color: #3cbc8d;
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        main {
            flex: 1;
            display: flex;
            align-items: center;    
            justify-content: center; 
            flex-direction: column;
        }

        footer {
            text-align: center;
            padding: 15px;
            color: #666;
            font-size: 0.9em;
        }
    </style>
</head>
<body>

    <div class="login-brand">
        STUDENT FORUM SYSTEM
    </div>

    <main>
        <?= $output ?>
    </main>

    <footer>
        &copy; Student Forum 2025 - Secure Login Portal
    </footer>

</body>
</html>