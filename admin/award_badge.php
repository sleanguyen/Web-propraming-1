<?php
require 'login/Check.php'; // PROTECT ADMIN PAGE
include '../includes/DatabaseConnection.php';
include '../includes/MailService.php'; // CALL MAIL LIBRABRIES

$message = "";

// wHEN CLICK SENT BUTTON
if (isset($_POST['submit'])) {
    // GET STUDENT IN4 FROM ID
    $stmt = $pdo->prepare("SELECT name, email FROM user WHERE id = :id");
    $stmt->execute(['id' => $_POST['student_id']]);
    $student = $stmt->fetch();

    if ($student) {
        // mAIL
        $result = sendBadgeEmail($student['email'], $student['name'], $_POST['badge'], $_POST['reason']);
        
        if ($result === true) {
            $message = "<p style='color: green;'>Email sent successfully to " . htmlspecialchars($student['name']) . "!</p>";
        } else {
            $message = "<p style='color: red;'>Error: $result</p>";
        }
    }
}

// GET USER 
$users = $pdo->query("SELECT * FROM user")->fetchAll();

$title = "Award Badge";
ob_start();
?>

<div style="max-width: 600px; margin: 20px auto; background: #fff; padding: 30px; border-radius: 8px; border: 1px solid #e1e4e8;">
    <h2 style="text-align: center; color: #333;">🏅 Award Student Badge</h2>
    <?= $message ?>

    <form action="" method="post" style="display: flex; flex-direction: column; gap: 15px;">
        
        <div>
            <label style="font-weight: bold;">Select Student:</label>
            <select name="student_id" required style="width: 100%; padding: 10px; margin-top: 5px;">
    <?php foreach ($users as $u): ?>
        <option value="<?= $u['id'] ?>" 
            <?= (isset($_GET['student_id']) && $_GET['student_id'] == $u['id']) ? 'selected' : '' ?>>
            
            <?= htmlspecialchars($u['name']) ?> (<?= htmlspecialchars($u['email']) ?>)
        
        </option>
    <?php endforeach; ?>
</select>
        </div>

        <div>
            <label style="font-weight: bold;">Badge Type:</label>
            <select name="badge" required style="width: 100%; padding: 10px; margin-top: 5px;">
                <option value="Top Question of the Week">🌟 Top Question of the Week</option>
                <option value="Helpful Hero">🦸 Helpful Hero (Best Answer)</option>
                <option value="Bug Hunter">🐛 Bug Hunter</option>
                <option value="Active Learner">📚 Active Learner</option>
            </select>
        </div>

        <div>
            <label style="font-weight: bold;">Reason / Message:</label>
            <textarea name="reason" rows="3" required placeholder="Ex: For asking a very insightful question about PHP Security..." style="width: 100%; padding: 10px; margin-top: 5px;"></textarea>
        </div>

        <input type="submit" name="submit" value="Send Badge & Email" 
               style="background-color: #e67e22; color: white; border: none; padding: 12px; cursor: pointer; font-weight: bold; border-radius: 4px;">
    </form>
</div>

<?php
$output = ob_get_clean();
include '../templates/admin_layout.html.php';
?>