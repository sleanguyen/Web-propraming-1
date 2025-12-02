<?php
session_start();
session_destroy(); // Delete season
header("Location: ../../index.php"); // return index
exit();
?>