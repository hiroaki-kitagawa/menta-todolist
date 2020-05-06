<?php
require_once(dirname(__FILE__,2) . "/config/dbconfig.php");

class userValidation {
    public $data;
    private $db;

    function __construct()	{
        $this->db = new PDO(DSN, DB_USER, DB_PASS);
    }

    public function setData($params)
    {
        $this->data = $params;
    }


    public function isValid()
    {
        $_SESSION['errormsg'] = array();
        $mail = $this->data['mail'];
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errormsg']['mail'] = "メールアドレスが正しくありません。";
            return false;
        }
        $pass = $this->data['pass'];
        if ($pass === '') {
            $_SESSION['errormsg']['pass'] = "パスワードが入力されていません。";
            return false;
        }
        return true;
    }

    public function validUser()
    {
        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':email' => $this->data));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        // DB接続を解除
        $db = null;
        $stmt = null;

        if (empty($result)) {
            return false;
        } else {
            return true;
        }
    }

    public function getData()
    {
        return $_SESSION['success'];
    }

}
