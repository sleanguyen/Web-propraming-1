<div style="max-width: 500px; margin: 20px auto; background: #fff; padding: 30px; border-radius: 8px; border: 1px solid #ccc; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    <h2 style="text-align: center; color: #333;">Edit Student Info</h2>
    
    <form action="" method="post" autocomplete="off">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Name:</label>
            <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 15px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Email:</label>
            <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="margin-bottom: 20px; background-color: #fff3cd; padding: 10px; border-radius: 5px; border: 1px solid #ffeeba;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px; color: #856404;">Reset Password:</label>
            <input type="password" name="password" placeholder="Leave blank to keep current password"
                   autocomplete="new-password"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <small style="color: #666; font-style: italic;">Only enter data here if you want to change the user's password.</small>
        </div>

        <div style="text-align: center;">
            <input type="submit" name="submit" value="Update User"
                   style="background-color: #3cbc8d; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold;">
            
            <a href="users.php" style="margin-left: 10px; text-decoration: none; color: #555;">Cancel</a>
        </div>
    </form>
</div>