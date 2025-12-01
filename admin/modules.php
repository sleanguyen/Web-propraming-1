<?php
require 'login/Check.php';
try {
    include '../includes/DatabaseConnection.php';

    // Lấy danh sách module
    $sql = 'SELECT * FROM module';
    $modules = $pdo->query($sql)->fetchAll();

    $title = 'Manage Modules';
    ob_start();
?>

<style>
    /* CSS Bảng (Dùng lại style của Users cho đồng bộ) */
    .module-table {
        width: 100%; border-collapse: collapse; margin: 25px 0;
        background-color: white; border-radius: 8px; overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }
    .module-table thead tr { background-color: #3cbc8d; color: white; text-align: left; }
    .module-table th, .module-table td { padding: 12px 20px; border-bottom: 1px solid #ddd; }
    .module-table tbody tr:hover { background-color: #f1f1f1; }

    /* Nút Add New */
    .btn-add {
        display: inline-block; background-color: #2c3e50; color: white; 
        padding: 10px 20px; text-decoration: none; border-radius: 5px; 
        font-weight: bold; margin-bottom: 15px;
    }
    .btn-add:hover { background-color: #1a252f; }

    /* Nút Edit/Delete */
    .btn-action {
        text-decoration: none; padding: 5px 10px; border-radius: 4px; color: white; font-size: 0.9em; margin-right: 5px; border: none; cursor: pointer;
    }
    .btn-edit { background-color: #e67e22; }
    .btn-delete { background-color: #e74c3c; }
</style>

<div style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <h2 style="text-align: center; color: #333;">Manage Modules</h2>

    <a href="editmodule.php" class="btn-add">+ Add New Module</a>

    <table class="module-table">
        <thead>
            <tr>
                <th width="10%">ID</th>
                <th width="60%">Module Name</th>
                <th width="30%" style="text-align: center;">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($modules as $m): ?>
            <tr>
                <td>#<?= htmlspecialchars($m['id']) ?></td>
                <td style="font-weight: bold;"><?= htmlspecialchars($m['module_name']) ?></td>
                <td style="text-align: center;">
                    
                    <a href="editmodule.php?id=<?= $m['id'] ?>" class="btn-action btn-edit">Edit</a>
                    
                    <form action="deletemodule.php" method="post" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $m['id'] ?>">
                        <input type="submit" value="Delete" class="btn-action btn-delete" onclick="return confirm('Are you sure? This will delete ALL questions in this module!');">
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