<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Registration</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-card {
            background-color: white;
            width: 100%;
            max-width: 450px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h2 {
            color: #3cbc8d;
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .error-msg {
            background-color: #ffebee;
            color: #c62828;
            padding: 12px;
            border-radius: 6px;
            border: 1px solid #ef9a9a;
            margin-bottom: 20px;
            text-align: center;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border 0.3s;
            outline: none;
        }

        input:focus {
            border-color: #3cbc8d;
            box-shadow: 0 0 0 3px rgba(60, 188, 141, 0.1);
        }

        .btn-submit {
            width: 100%;
            background-color: #3cbc8d;
            color: white;
            border: none;
            padding: 14px;
            border-radius: 6px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #2ea379;
        }

        .footer-link {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }

        .footer-link a {
            color: #3cbc8d;
            text-decoration: none;
            font-weight: bold;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="register-card">
        
        <div class="header">
            <h2>📝 Student Register</h2>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error-msg">
                ⚠️ <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" autocomplete="off">
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" placeholder="Ex: John Doe" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Ex: student@university.edu" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Create Password</label>
                <input type="password" id="password" name="password" placeholder="Min 6 characters" required autocomplete="new-password">
            </div>

            <input type="submit" name="submit" value="Create Account" class="btn-submit">
        </form>

        <div class="footer-link">
            Already have an account? <br>
            <a href="login.php">Login here</a>
        </div>

    </div>

</body>
</html>