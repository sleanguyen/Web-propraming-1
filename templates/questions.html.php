<?php if (isset($error)): ?>
    <p><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></p>
<?php else: ?>

    <div class="feed-container">
        <p style="margin-bottom: 20px; color: #555; font-weight: bold;">
            Total posts: <?= $totalQuestions ?>
        </p>

        <?php foreach ($questions as $q): ?>
            
            <?php
                // CHECK OWNERSHIP
                $isOwner = false;
                if (isset($_SESSION['UserId']) && $_SESSION['UserId'] == $q['userid']) {
                    $isOwner = true;
                }
            ?>

            <div class="question-card">
                
                <div class="card-header">
                    <span class="username"><?= htmlspecialchars($q['name'] ?? 'Unknown', ENT_QUOTES, 'UTF-8') ?></span>
                    <div class="sub-info">
                        <span class="module-badge"><?= htmlspecialchars($q['module'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="post-date">&bull; <?= !empty($q['date']) ? date("d M Y", strtotime($q['date'])) : '' ?></span>
                    </div>
                </div>

                <div class="card-body">
                    <p><?= nl2br(htmlspecialchars($q['text'], ENT_QUOTES, 'UTF-8')) ?></p>
                </div>

                <?php if (!empty($q['img'])): ?>
                    <div class="card-image">
                        <?php $path = (isset($isAdmin) && $isAdmin) ? '../' : ''; $path .= $q['img']; ?>
                        <img src="<?= htmlspecialchars($path, ENT_QUOTES, 'UTF-8') ?>" alt="Post Image">
                    </div>
                <?php endif; ?>

                <div style="border-top: 1px solid #eee; margin-top: 10px; padding-top: 10px; display: flex; align-items: center; gap: 15px;">
                    
                    <form action="<?= (isset($isAdmin) && $isAdmin) ? '../like.php' : 'like.php' ?>" method="post">
                        <input type="hidden" name="question_id" value="<?= $q['id'] ?>">
                        <button type="submit" style="background: none; border: none; cursor: pointer; color: #e67e22; font-weight: bold;">
                            ❤️ Like (<?= $q['like_count'] ?>)
                        </button>
                    </form>

                    <?php if ((isset($isAdmin) && $isAdmin) || $isOwner): ?>
                        <?php $editLink = (isset($isAdmin) && $isAdmin) ? "editquestion.php?id={$q['id']}" : "admin/editquestion.php?id={$q['id']}"; ?>
                        <a href="<?= $editLink ?>" style="text-decoration: none; color: blue; font-size: 0.9em;">Edit</a>
                    <?php endif; ?>

                    <?php if (isset($isAdmin) && $isAdmin): ?>
                        <form action="deletequestion.php" method="post" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $q['id'] ?>">
                            <input type="submit" value="Delete" style="background:none; border:none; color:red; cursor:pointer; font-size: 0.9em;" onclick="return confirm('Delete post?');">
                        </form>
                    <?php endif; ?>
                </div>

                <div style="background-color: #f9f9f9; padding: 10px; margin-top: 10px; border-radius: 5px;">
                    
                    <?php
                        // Fetch comments
                        include (isset($isAdmin) && $isAdmin ? '../' : '') . 'includes/DatabaseConnection.php';
                        $stmt = $pdo->prepare("SELECT comment.*, user.name 
                                               FROM comment 
                                               JOIN user ON comment.userid = user.id 
                                               WHERE questionid = :qid 
                                               ORDER BY id ASC");
                        $stmt->execute(['qid' => $q['id']]);
                        $comments = $stmt->fetchAll();
                    ?>
                    
                    <?php foreach ($comments as $c): ?>
                        <div style="font-size: 0.9em; margin-bottom: 5px; border-bottom: 1px solid #eee; padding-bottom: 5px; display: flex; justify-content: space-between; align-items: center;">
                            
                            <div style="flex: 1;">
                                <strong style="color: #2c3e50;"><?= htmlspecialchars($c['name']) ?>:</strong> 
                                <?= htmlspecialchars($c['text'], ENT_QUOTES, 'UTF-8') ?>
                            </div>

                            <div style="display: flex; gap: 10px; margin-left: 10px;">
                                
                                <?php
                                    // owner comment
                                    $isCommentOwner = (isset($_SESSION['UserId']) && $_SESSION['UserId'] == $c['userid']);
                                    $isAdminUser = (isset($_SESSION['UserType']) && $_SESSION['UserType'] == 'Admin');
                                ?>

                                <?php if ($isCommentOwner || $isAdminUser): ?>
                                    <a href="<?= (isset($isAdmin) && $isAdmin) ? '../editcomment.php?id=' : 'editcomment.php?id=' ?><?= $c['id'] ?>" 
                                       style="text-decoration: none; color: blue; font-size: 0.8em;">Edit</a>
                                <?php endif; ?>

                                <?php if ($isAdminUser): ?>
                                    <form action="<?= (isset($isAdmin) && $isAdmin) ? 'deletecomment.php' : 'admin/deletecomment.php' ?>" method="post" style="display: inline;">
                                        <input type="hidden" name="id" value="<?= $c['id'] ?>">
                                        <button type="submit" style="border: none; background: none; color: red; font-size: 0.8em; cursor: pointer;" onclick="return confirm('Delete comment?');">X</button>
                                    </form>
                                <?php endif; ?>
                                
                            </div>

                        </div>
                    <?php endforeach; ?>

                    <?php if (isset($_SESSION['Authorised'])): ?>
                        <form action="<?= (isset($isAdmin) && $isAdmin) ? '../comment.php' : 'comment.php' ?>" method="post" style="display: flex; gap: 5px; margin-top: 10px;">
                            <input type="hidden" name="question_id" value="<?= $q['id'] ?>">
                            <input type="text" name="comment_text" placeholder="Write a comment..." required style="flex: 1; padding: 8px; border: 1px solid #ccc; border-radius: 20px; outline: none;">
                            <button type="submit" style="background-color: #3cbc8d; color: white; border: none; padding: 8px 15px; border-radius: 20px; cursor: pointer; font-weight: bold;">➤</button>
                        </form>
                    <?php else: ?>
                        <div style="margin-top: 10px; font-size: 0.9em; color: #777;">
                            <a href="<?= (isset($isAdmin) && $isAdmin) ? '../admin/login/login.php' : 'admin/login/login.php' ?>" style="color: #3cbc8d; text-decoration: none; font-weight: bold;">Log in</a> to leave a comment.
                        </div>
                    <?php endif; ?>
                    
                </div>

            </div>
        <?php endforeach; ?>
    </div>

<?php endif; ?>