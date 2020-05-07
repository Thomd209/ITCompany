<?php
    //Страница выхода пользователя из сайта
    session_start();
    $_SESSION['auth'] = null;
    header('Location: signin.php');
?>