<div style="max-width: 800px; margin: 30px auto;">

    <div style="background: white; padding: 30px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); margin-bottom: 30px;">
        <h2 style="color: #3cbc8d; border-bottom: 2px solid #eee; padding-bottom: 10px; margin-top: 0;">👤 My Profile</h2>

        <?php if ($message): ?>
            <div style="background: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 15px;">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" style="display: flex; gap: 20px; flex-wrap: wrap;">
            <div style="flex: 1; min-width: 250px;">
                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block;">Full Name:</label>
                    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required
                           style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
                </div>
                <input type="submit" name="update_profile" value="Update Name"
                       style="background-color: #3cbc8d; color: white; border: none; padding: 10px 20px; font-weight: bold; border-radius: 5px; cursor: pointer;">
            </div>

            <div style="flex: 1; min-width: 250px;">
                <div style="margin-bottom: 15px;">
                    <label style="font-weight: bold; display: block;">Email:</label>
                    <input type="text" value="<?= htmlspecialchars($user['email']) ?>" disabled
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; background: #f9f9f9; color: #777; border-radius: 5px;">
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="font-weight: bold; display: block;">Password:</label>
                    <input type="password" value="********" disabled
                           style="width: 100%; padding: 10px; border: 1px solid #ddd; background: #f9f9f9; color: #777; border-radius: 5px;">
                </div>
                <a href="help.php" style="font-size: 0.9em; color: #e67e22; text-decoration: none;">Request Change Email/Pass &rarr;</a>
            </div>
        </form>
    </div>

    <h2 style="color: #2c3e50; border-bottom: 2px solid #3cbc8d; padding-bottom: 10px; display: inline-block;">
        📝 My Activity (<?= count($myQuestions) ?>)
    </h2>

    <?php if (count($myQuestions) > 0): ?>
        
        <?php foreach ($myQuestions as $q): ?>
            <div class="question-card" style="margin-bottom: 30px;">
                
                <div class="card-header">
                    <span class="username">You</span>
                    <div class="sub-info">
                        <span class="module-badge"><?= htmlspecialchars($q['module_name'] ?? 'General') ?></span>
                        <span class="post-date">&bull; <?= date("d M Y", strtotime($q['date'])) ?></span>
                    </div>
                </div>

                <div class="card-body">
                    <p><?= nl2br(htmlspecialchars($q['text'])) ?></p>
                </div>

                <?php if (!empty($q['img'])): ?>
                    <div class="card-image">
                        <img src="<?= htmlspecialchars($q['img']) ?>" alt="Post Image">
                    </div>
                <?php endif; ?>

                <div style="border-top: 1px solid #eee; margin-top: 10px; padding-top: 10px; display: flex; gap: 15px; align-items: center;">
                    
                    <form action="like.php" method="post">
                        <input type="hidden" name="question_id" value="<?= $q['id'] ?>">
                        <button type="submit" style="background: none; border: none; cursor: pointer; color: #e67e22; font-weight: bold;">
                            ❤️ Like (<?= $q['like_count'] ?>)
                        </button>
                    </form>

                    <a href="editquestion.php?id=<?= $q['id'] ?>" style="text-decoration: none; color: blue; font-weight: bold; font-size: 0.9em;">✏️ Edit</a>

                    <?php if (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Admin'): ?>
                        <form action="deletequestion.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $q['id'] ?>">
                            <button type="submit" style="background: none; border: none; color: red; font-weight: bold; font-size: 0.9em; cursor: pointer;" onclick="return confirm('Delete this post?');">🗑️ Delete</button>
                        </form>
                    <?php endif; ?>
                </div>

                <div style="background-color: #f9f9f9; padding: 10px; margin-top: 10px; border-radius: 5px;">
                    
                    <?php
                        // Fetch comments for this post
                        // Since we are inside a template loop, we use the existing $pdo connection
                        $stmt = $pdo->prepare("SELECT comment.*, user.name 
                                               FROM comment 
                                               JOIN user ON comment.userid = user.id 
                                               WHERE questionid = :qid 
                                               ORDER BY id ASC");
                        $stmt->execute(['qid' => $q['id']]);
                        $comments = $stmt->fetchAll();
                    ?>
                    
                    <?php foreach ($comments as $c): ?>
                        <div style="font-size: 0.9em; margin-bottom: 5px; border-bottom: 1px solid #eee; padding-bottom: 5px;">
                            <strong style="color: #2c3e50;"><?= htmlspecialchars($c['name']) ?>:</strong> 
                            <?= htmlspecialchars($c['text']) ?>
                        </div>
                    <?php endforeach; ?>

                    <form action="comment.php" method="post" style="display: flex; gap: 5px; margin-top: 10px;">
                        <input type="hidden" name="question_id" value="<?= $q['id'] ?>">
                        <input type="text" name="comment_text" placeholder="Write a comment..." required 
                               style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 20px; outline: none;">
                        <button type="submit" style="background-color: #3cbc8d; color: white; border: none; padding: 8px 15px; border-radius: 20px; cursor: pointer; font-weight: bold;">➤</button>
                    </form>
                    
                </div>

            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div style="text-align: center; padding: 40px; background: white; border-radius: 8px; color: #777;">
            <p>You haven't posted anything yet.</p>
            <a href="addquestion.php" style="display: inline-block; margin-top: 10px; color: #3cbc8d; font-weight: bold; text-decoration: none;">+ Create your first post</a>
        </div>
    <?php endif; ?>

</div>