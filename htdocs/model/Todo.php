<?php

include '../config/dbconfig.php';

class Todo {

    private $db;

    function __construct()	{
        $this->db = new PDO(DSN, DB_USER, DB_PASS);
    }

    public function getAll()
    {
        // ユーザーIDを一時的に定義
        $id = 1;

        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $sql = "SELECT * FROM todos WHERE user_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMesasge();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function findById($id)
    {

        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $sql = "SELECT * FROM todos WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMesasge();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function delete($id)
    {
        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $this->db->beginTransaction();
            $sql = "DELETE FROM todos WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function insert($title, $detail)
    {
        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        $user_id = 1; // 一時的に固定
        $status = 0;
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        try {
            $this->db->beginTransaction();
            $sql = "INSERT INTO todos (user_id, title, detail, status, created_at, updated_at, deleted_at) VALUES (:user_id, :title, :detail, :status, :created_at, :updated_at, NULL)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':user_id' => $user_id, ':title' => $title, ':detail' => $detail, ':status' => $status, ':created_at' => $created_at, ':updated_at' => $updated_at));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function editTodo($id)
    {

        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        try {
            $sql = "SELECT * FROM todos WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo $e->getMessage();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

    public function update($id, $title, $detail, $status)
    {
        $db = null;
        $sql = null;
        $stmt = null;
        $result = null;

        $user_id = 1; // ユーザID一時的に固定
        
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');

        try {
            $this->db->beginTransaction();
            // $sql = "UPDATE todos SET (user_id, title, detail, status, created_at, updated_at, deleted_at) VALUES (:user_id, :title, :detail, :status, :created_at, :updated_at, NULL) WHERE id = :id";
            $sql = "UPDATE todos SET
                user_id = :user_id,
                title = :title,
                detail = :detail,
                status = :status,
                created_at = :created_at,
                updated_at = :updated_at,
                deleted_at = NULL
                WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':user_id' => $user_id, ':title' => $title, ':detail' => $detail, ':status' => $status, ':created_at' => $created_at, ':updated_at' => $updated_at, ':id' => $id));
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->db->commit();
        } catch(PDOException $e) {
            $this->db->rollBack();
            echo $e->getMessage();
        }

        // DB接続を解除
        $stmt = null;
        $db = null;

        return $result;
    }

}
