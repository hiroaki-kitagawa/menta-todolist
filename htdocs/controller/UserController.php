<?php
session_start();
require_once(dirname(__FILE__,2) . "/model/User.php");
require_once(dirname(__FILE__,2) . "/validations/userValidation.php");


class UserController {
    public function register()
    {
        $name= $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];

        $validation = new userValidation;
        $validation->setData($email);

        $data = array(
            'name' => $name,
            'email' => $email,
            'pass' => $pass,
        );

        if($validation->validUser()) {
            $_SESSION['errormsg'] = "既に登録されているメールアドレスです。";
            header("Location: signup.php");
        } else {
            $user = new User();
            $user->insertUser($data);
            header("Location: ../todo/top.php");
        }
    }

}
