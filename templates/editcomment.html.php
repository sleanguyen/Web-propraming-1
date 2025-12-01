<div style="max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; border: 1px solid #ddd;">
    <h3>Edit Your Comment</h3>
    
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $comment['id'] ?>">
        
        <textarea name="text" rows="4" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;"><?= htmlspecialchars($comment['text'], ENT_QUOTES, 'UTF-8') ?></textarea>
        
        <br><br>
        <input type="submit" value="Update Comment" style="background-color: #3cbc8d; color: white; border: none; padding: 10px 20px; cursor: pointer; border-radius: 4px;">
        <a href="questions.php" style="margin-left: 10px; color: #555; text-decoration: none;">Cancel</a>
    </form>
</div>