<?php
session_start();
require_once(dirname(__FILE__,2) . "/model/Register.php");

class RegisterController {
    public function register()
    {
        $register = new Register();
        if($register->addUser()) {
            header("Location: top.php");
        } else {
            header("Location: signup.php");
        }

    }
}
