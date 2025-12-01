<?php
session_start();

// 1. Check if user is logged in
if (!isset($_SESSION['Authorised']) || $_SESSION['Authorised'] != 'Y') {
    // Stop execution and show message (Good for screenshot!)
    die("<h1 style='color:red; text-align:center; margin-top:50px;'>⚠️ ACCESS DENIED: Please Login First</h1>");
}

// 2. Check if user is ADMIN (Role-Based Access Control)
// If the user exists but is NOT an Admin, block them.
if (!isset($_SESSION['UserType']) || $_SESSION['UserType'] != 'Admin') {
    
    // --- THIS IS THE MESSAGE FOR YOUR SCREENSHOT ---
    die("<h1 style='color:red; text-align:center; margin-top:50px;'>⛔ ACCESS DENIED: Students cannot access this area!</h1>");
}
?>