<?php
require_once(dirname(__FILE__,2) . "/config/dbconfig.php");

class todoValidation {
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

    public function getData()
    {
        return $_SESSION['success'];
    }

}
