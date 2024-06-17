<?php

session_start();

if (!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] === false) {
    header("Location: auth-login.php");
    exit;
}

?>