<?php
    session_start();

    if (isset($_POST['login'])&&isset($_POST['username'])) {
        unset($_SESSION['login']);
        unset($_SESSION['username']);
        unset($_SESSION['password']);
    }
    header('Location: login.php');

?>