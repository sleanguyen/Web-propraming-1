<?php
session_start();
include '../../includes/DatabaseConnection.php';

$error = '';

if (isset($_POST['submit'])) {
    try {
        // 1. Lấy dữ liệu từ form
        $name = $_POST['name'];
        $email = trim($_POST['email']);
        $password = $_POST['password'];

        // 2. Kiểm tra xem email đã tồn tại chưa
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM user WHERE email = :email");
        $stmt->execute(['email' => $email]);
        
        if ($stmt->fetchColumn() > 0) {
            $error = "This email is already registered!";
        } else {
            // 3. Mã hóa mật khẩu (Bảo mật)
            // Lưu ý: Nếu bạn muốn đơn giản để báo cáo, có thể lưu thẳng. 
            // Nhưng password_hash là tiêu chuẩn.
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // 4. Chèn vào database
            // Cập nhật nhẹ trong file register.php (nếu muốn tường minh)
            $sql = "INSERT INTO user (name, email, password, role) VALUES (:name, :email, :pass, 'Student')";   
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'email' => $email,
                'pass' => $hashed_password
            ]);

            // 5. Đăng ký thành công -> Chuyển sang trang Login
            header('Location: login.php');
            exit();
        }

    } catch (PDOException $e) {
        $error = "Database Error: " . $e->getMessage();
    }
}

// Load giao diện
include '../../templates/register.html.php';
?>