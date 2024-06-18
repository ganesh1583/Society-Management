<?php
    session_start();
    $_SESSION = array();
    session_destroy();
    header("Location: /Society_Management/authentication/login.php");
    exit;
?>
