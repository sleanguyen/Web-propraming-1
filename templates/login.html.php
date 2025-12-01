<div class="login-wrapper">
    
    <?php if (!empty($error)): ?>
        <div class="error-box">
            ⚠️ <?= $error ?>
        </div>
    <?php endif; ?>

    <div class="login-card">
        
        <div class="login-header">
            <h2>System Login</h2>
            <p>Please enter your credentials</p>
        </div>
        
        <form action="" method="post" autocomplete="off">
            
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="e.g. alice@gmail.com" required autocomplete="off">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter password" required autocomplete="new-password">
            </div>

            <div class="form-group">
                <label>Login As</label>
                <select name="role">
                    <option value="Student">🎓 Student</option>
                    <option value="Admin">🛡️ Admin</option>
                </select>
            </div>
            
            <button type="submit" class="btn-login">Login</button>
        </form>

        <div class="login-footer">
            <a href="register.php" class="link-register">Create Student Account</a>
            <span class="separator">|</span>
            <a href="../../index.php" class="link-home">Back to Home</a>
        </div>

    </div>
</div>

<style>
    /* Reset & Base */
    * { box-sizing: border-box; }
    
    /* Wrapper to center everything on screen */
    .login-wrapper {
        min-height: 80vh;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        background-color: #f0f2f5;
        padding: 20px;
    }

    /* The White Card */
    .login-card {
        background-color: white;
        width: 100%;
        max-width: 450px; /* Limits width so it doesn't stretch */
        padding: 40px;
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.1); /* Soft shadow */
    }

    /* Header Styling */
    .login-header {
        text-align: center;
        margin-bottom: 30px;
    }
    .login-header h2 {
        color: #3cbc8d;
        margin: 0 0 10px 0;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .login-header p {
        color: #666;
        margin: 0;
        font-size: 0.9em;
    }

    /* Input Fields */
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #333;
        font-size: 0.95em;
    }
    .form-group input, 
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1em;
        background-color: #fff;
        transition: border 0.3s;
    }
    .form-group input:focus,
    .form-group select:focus {
        border-color: #3cbc8d;
        outline: none;
        box-shadow: 0 0 0 3px rgba(60, 188, 141, 0.1);
    }

    /* Login Button */
    .btn-login {
        width: 100%;
        padding: 14px;
        background-color: #3cbc8d;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 1.1em;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s;
    }
    .btn-login:hover {
        background-color: #2ea379;
    }

    /* Footer Links */
    .login-footer {
        margin-top: 25px;
        text-align: center;
        font-size: 0.9em;
        border-top: 1px solid #eee;
        padding-top: 20px;
    }
    .login-footer a {
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }
    .link-register { color: #3cbc8d; }
    .link-home { color: #7f8c8d; }
    .link-register:hover, .link-home:hover { text-decoration: underline; }
    .separator { margin: 0 10px; color: #ddd; }

    /* Error Message */
    .error-box {
        max-width: 450px;
        width: 100%;
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
        padding: 15px;
        border-radius: 8px;
        text-align: center;
        margin-bottom: 20px;
    }
</style>