<div style="max-width: 500px; margin: 30px auto; background: #fff; padding: 30px; border-radius: 8px; border: 1px solid #ccc; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
    
    <h2 style="text-align: center; color: #333;">
        <?= ($module['id'] == '') ? 'Add New Module' : 'Edit Module' ?>
    </h2>
    
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($module['id']) ?>">

        <div style="margin-bottom: 20px;">
            <label style="display: block; font-weight: bold; margin-bottom: 5px;">Module Name:</label>
            <input type="text" name="module_name" value="<?= htmlspecialchars($module['module_name']) ?>" required
                   placeholder="E.g. COMP1841 - Web Development"
                   style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
        </div>

        <div style="text-align: center;">
            <input type="submit" name="submit" value="Save Module"
                   style="background-color: #3cbc8d; color: white; padding: 10px 25px; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; font-size: 1em;">
            
            <a href="modules.php" style="margin-left: 15px; text-decoration: none; color: #555;">Cancel</a>
        </div>
    </form>
</div>