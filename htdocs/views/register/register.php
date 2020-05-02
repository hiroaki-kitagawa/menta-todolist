<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/RegisterController.php");

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['pass'] = password_hash($_POST['pass'], PASSWORD_BCRYPT);

    RegisterController::register();
