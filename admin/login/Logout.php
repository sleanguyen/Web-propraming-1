<?php
session_start();
session_destroy(); // Xóa sạch phiên đăng nhập
header("Location: ../../index.php"); // Quay về trang chủ (lùi 2 cấp thư mục)
exit();
?>