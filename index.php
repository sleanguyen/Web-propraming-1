<?php
session_start();

// Define page title
$title = 'Home - University of Greenwich Forum';

// Load the Home Template
ob_start();
include 'templates/home.html.php';
$output = ob_get_clean();

// Load the Main Layout
include 'templates/layout.html.php';
?>