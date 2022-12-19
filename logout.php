<?php
    session_start();

    /*if (isset($_POST['login'])) {
        unset($_SESSION['username']);
        unset($_SESSION['password']);
        unset($_SESSION['id_usuario']);
        unset($_SESSION['login']);
    }*/
    session_unset();

    session_destroy();
    header('Location: login.php');

?>