<form action="" method="post" enctype="multipart/form-data" 
      style="display: flex; flex-direction: column; gap: 15px; 
             max-width: 600px; margin: 20px auto; 
             background-color: #fff; padding: 30px; 
             border-radius: 8px; border: 1px solid #e1e4e8; 
             box-shadow: 0 2px 5px rgba(0,0,0,0.05);">

    <h2 style="text-align: center; margin-bottom: 10px; color: #333;">Create New Post</h2>

    <div>
        <label style="display: block; margin-bottom: 8px; font-weight: bold;">Posting as:</label>
        <div style="padding: 10px; background-color: #f0f2f5; border: 1px solid #ccc; border-radius: 4px; color: #555; font-weight: bold;">
            👤 <?= htmlspecialchars($_SESSION['UserName'] ?? 'Unknown') ?>
        </div>
    </div>

    <div>
        <label for="questiontext" style="display: block; margin-bottom: 8px; font-weight: bold;">Question Content:</label>
        <textarea id="questiontext" name="questiontext" rows="5" required
                  style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; font-family: inherit;"></textarea>
    </div>

    <div>
        <label for="image" style="display: block; margin-bottom: 8px; font-weight: bold;">Upload Image (Optional):</label>
        <input type="file" name="image" id="image" style="padding: 5px;">
    </div>

    <div>
        <label for="module" style="display: block; margin-bottom: 8px; font-weight: bold;">Module:</label>
        <select name="module" id="module" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box;">
            <option value="">-- Select Module --</option>
            <?php foreach ($modules as $module): ?>
                <option value="<?= htmlspecialchars($module['id']) ?>">
                    <?= htmlspecialchars($module['module_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div style="text-align: center; margin-top: 10px;">
        <input type="submit" value="Post Question" 
               style="background-color: #3cbc8d; color: white; border: none; 
                      padding: 12px 30px; cursor: pointer; border-radius: 4px; 
                      font-size: 1.1em; font-weight: bold; width: 100%;">
    </div>

</form>