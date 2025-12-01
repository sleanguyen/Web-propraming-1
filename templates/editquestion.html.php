<form action="" method="post" style="max-width: 600px; margin: 20px auto; padding: 20px; background: #fff; border: 1px solid #ddd; border-radius: 8px;">
  
  <input type="hidden" name="questionid" value="<?= htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8') ?>">

  <div style="margin-bottom: 15px;">
      <label for="text" style="font-weight: bold; display: block; margin-bottom: 5px;">Edit your question:</label>
      <textarea name="text" id="text" rows="5" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"><?= htmlspecialchars($question['text'], ENT_QUOTES, 'UTF-8') ?></textarea>
  </div>
  
  <div style="margin-bottom: 15px;">
      <label for="module" style="font-weight: bold; display: block; margin-bottom: 5px;">Module:</label>
      <select name="module" id="module" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        <?php foreach ($modules as $m): ?>
            <option value="<?= $m['id'] ?>"
                <?php 
                
                if ($m['id'] == $question['module']) echo 'selected'; 
                ?> >
                <?= htmlspecialchars($m['module_name'], ENT_QUOTES, 'UTF-8') ?>
            </option>
        <?php endforeach; ?>
      </select>
  </div>

  <input type="submit" name="submit" value="Save Changes" style="background-color: #3cbc8d; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer; font-weight: bold;">
  
  <a href="questions.php" style="margin-left: 10px; text-decoration: none; color: #555;">Cancel</a>
</form>