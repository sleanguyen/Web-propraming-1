<?php
require 'login/Check.php'; 
try {
    include '../includes/DatabaseConnection.php';

    $sql = 'SELECT * FROM user';
    $users = $pdo->query($sql);

    $title = 'Manage Users';
    ob_start();
?>

<style>
    .user-table {
        width: 100%;
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.95em; erif;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        background-color: white;
        border-radius: 8px;
        overflow: hidden;
    }

    .user-table thead tr {
        background-color: #3cbc8d;
        color: #ffffff;
        text-align: left;
    }

    .user-table th, .user-table td {
        padding: 12px 20px; 
    }

    .nowrap {
        white-space: nowrap;
        max-width: 300px; 
        overflow: hidden;
        text-overflow: ellipsis; 
    }

    .user-table tbody tr { border-bottom: 1px solid #dddddd; }
    .user-table tbody tr:nth-of-type(even) { background-color: #f3f3f3; }
    .user-table tbody tr:hover { background-color: #e1f5fe; cursor: pointer; }

   
    .btn {
        text-decoration: none;
        color: white;
        padding: 6px 12px;
        border-radius: 5px;
        font-weight: bold;
        font-size: 0.85em;
        margin-right: 5px;
        display: inline-block;
    }

    .btn-edit { background-color: #e67e22; }
    .btn-edit:hover { background-color: #d35400; }

   
    .btn-mail { background-color: #3498db; }
    .btn-mail:hover { background-color: #2980b9; }

    .alert-success {
        padding: 15px; background-color: #d4edda; color: #155724;
        border: 1px solid #c3e6cb; border-radius: 5px; margin-bottom: 20px;
        text-align: center; font-weight: bold;
    }
</style>

<div style="max-width: 1200px; margin: 0 auto; padding: 20px;">
    <h2 style="text-align: center; color: #333; margin-bottom: 30px;">Manage Students List</h2>

    <?php if (isset($_GET['msg']) && $_GET['msg'] == 'success'): ?>
        <div class="alert-success">✅ User information has been updated successfully!</div>
    <?php endif; ?>

    <table class="user-table">
        <thead>
            <tr>
                <th width="5%">ID</th>
                <th width="25%">Student Name</th>
                <th width="35%">Email Address</th>
                <th width="35%" style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td>#<?= htmlspecialchars($user['id']) ?></td>
                
                <td class="nowrap" style="font-weight: bold; color: #2c3e50;">
                    <?= htmlspecialchars($user['name']) ?>
                </td>
                
                <td style="text-align: center;">
    
    <a href="edituser.php?id=<?= $user['id'] ?>" class="btn btn-edit">
         Edit
    </a>
    
    <a href="award_badge.php?student_id=<?= $user['id'] ?>" class="btn btn-mail">
         Mail
    </a>

    <form action="deleteuser.php" method="post" style="display:inline;">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        
        <button type="submit" class="btn btn-delete" 
                onclick="return confirm('Are you sure? This will delete the user AND all their posts!');"
                style="background-color: #e74c3c; color: white; border: none; padding: 6px 12px; border-radius: 5px; font-weight: bold; cursor: pointer;">
             Delete
        </button>
    </form>

</td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>