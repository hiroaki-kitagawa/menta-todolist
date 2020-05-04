<?php
session_start();
require_once(dirname(__FILE__,2) . "/model/User.php");
require_once(dirname(__FILE__,2) . "/validations/validate.php");

class LoginController {
    public function login()
    {
        $mail = $_POST["mail"];
        $pass = $_POST["pass"];
        $data = array(
            "mail" => $mail,
            "pass" => $pass,
        );

        $validation = new Validation;

        $validation->setData($data);

        if ($validation->validEmail() && $validation->validPassword()){
            $user = new User();
            return $user->verifyPassword($data);

            header("Location: top.php");
        }
    }
}
