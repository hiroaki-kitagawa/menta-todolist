<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/LoginController.php");
    require_once(dirname(__FILE__,3) . "/validations/validate.php");

    LoginController::login();
