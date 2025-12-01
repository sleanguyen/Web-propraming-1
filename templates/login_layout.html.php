<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="../../question.css">
    
    <style>
        /* CSS RIÊNG CHO TRANG LOGIN */
        body {
            font-family: Arial, Helvetica, Sans-serif;
            background-color: #f0f2f5; /* Màu nền xám nhạt */
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }

        /* Logo hoặc Tên trường ở giữa */
        .login-brand {
            text-align: center;
            padding: 30px 0;
            color: #3cbc8d;
            font-size: 2.5em;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        /* Đẩy Footer xuống đáy */
        main {
            flex: 1;
            display: flex;
            align-items: center;     /* Căn giữa theo chiều dọc */
            justify-content: center; /* Căn giữa theo chiều ngang */
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