<?php
require_once(dirname(__FILE__,2) . "/config/dbconfig.php");

class User
{
    private $db;

    function __construct()	{
        $this->db = new PDO(DSN, DB_USER, DB_PASS);
    }

    public function verifyPassword($param)
    {
        $mail = $param['mail'];
        $pass = password_hash($param['pass'], PASSWORD_BCRYPT);

        try {
            $sql = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(':email', $mail);
            $stmt->execute();
            $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        var_dump($row['password']);

        if (password_verify($_POST['pass'], $row['password'])) {
            session_regenerate_id(true);
            $_SESSION['mail'] = $row['email'];
            echo 'ログインしました。';
        } else {
            echo 'メールアドレスまたはパスワードが間違っています。';
            return false;
        }
    }

    public function insertUser()
    {
        $db = null;
        $sql = null;
        $stmt = null;

        $name = $_SESSION['name'];
        $email = $_SESSION['email'];
        $password = password_hash($_SESSION['password'], PASSWORD_BCRYPT);

        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':name' => $name, ':email' => $email, ':password' => $password));
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

    }
}
