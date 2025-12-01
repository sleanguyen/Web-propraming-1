<?php
session_start();
if (!isset($_SESSION['Authorised']) || $_SESSION['Authorised'] != "Y") {
    // If not logged in, redirect to login page
    header("Location: login.php");
    exit();
}
?>