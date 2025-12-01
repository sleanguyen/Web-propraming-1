<?php
session_start();
if ($_POST["password"] == "secret") {
    $_SESSION["Authorised"] = "Y";
    header("Location: ../questions.php");
} else {
    header("Location: Login.html");
}
?>