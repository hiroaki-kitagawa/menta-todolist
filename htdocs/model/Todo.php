<?php

include 'dbconfig.php';

class Todo {
    public function getAll() {
        // ユーザーIDを一時的に定義
        $id = 1;

        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $db = new PDO(DSN, DB_USER, DB_PASS);
            $sql = "SELECT * FROM todos WHERE user_id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMesasge();
            die();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function getDetail() {
        $id = $_GET["id"];

        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;


        try {
            $db = new PDO(DSN, DB_USER, DB_PASS);
            $sql = "SELECT * FROM todos WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMesasge();
            die();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function deleteTodo() {
        $id = $_POST["id"];

        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $db = new PDO(DSN, DB_USER, DB_PASS);
            $sql = "DELETE FROM todos WHERE id = :id";
            $stmt = $db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
            die();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }
}
