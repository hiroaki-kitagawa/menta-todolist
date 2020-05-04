<?php
require_once(dirname(__FILE__,2) . "/config/dbconfig.php");

class Validation {
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
        if ($this->data['title'] === '') {
            $_SESSION['errormsg']['title'] = "タイトルが入力されていません。";
        } else {
            $_SESSION['success']['title'] = htmlspecialchars($this->data['title'], ENT_QUOTES, 'utf-8');
        }
        if ($this->data['detail'] === '') {
            $_SESSION['errormsg']['detail'] = "内容が入力されていません。";
        } else {
            $_SESSION['success']['detail'] = htmlspecialchars($this->data['detail'], ENT_QUOTES, 'utf-8');
        }
        if (empty($_SESSION['errormsg'])) {
            return true;
        } else {
            return false;
        }
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

    public function validEmail()
    {
        $_SESSION['errormsg'] = array();
        $mail = $this->data['mail'];
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errormsg']['mail'] = "メールアドレスが正しくありません。";
            return false;
        }
        return true;
    }

    public function validPassword()
    {
        $_SESSION['erromsg'] = array();
        $pass = $this->data['pass'];
        if ($pass === '') {
            $_SESSION['errormsg']['mail'] = "パスワードが入力されていません。";
            return false;
        }
        return true;
    }


    public function getData()
    {
        return $_SESSION['success'];
    }

}
