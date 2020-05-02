<?php
require_once(dirname(__FILE__,2) . "/config/dbconfig.php");

class Register
{
    private $db;

    function __construct()	{
        $this->db = new PDO(DSN, DB_USER, DB_PASS);
    }

    public function addUser()
    {
        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $password = password_hash($_SESSION['password'], PASSWORD_BCRYPT);

        try {
            $sql = "SELECT * FROM users WHERE email = :email AND password = :password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $member = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }


        if ($member['email'] == $email) {
            $_SESSION['msg'] = '同じメールアドレスが存在します。';
            return false;
        } else {
            // 登録されていなければinsert
            $this->db->beginTransaction();
            $sql = "INSERT INTO users(name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':name', $name);
            $stmt->bindValue(':email', $email);
            $stmt->bindValue(':password', $password);
            $stmt->execute();
            $this->db->commit();
            $_SESSION['msg'] = '会員登録が完了しました。';
            return true;
        }
    }
}
