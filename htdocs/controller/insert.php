<?php
    include '../model/database.php';

    $db = null;
    $sql = null;
    $stmt = null;
    $result = null;

    $user_id = 1;
    $title = $_POST["title"];
    $detail = $_POST["detail"];
    $status = $_POST["status"];
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    try {
        $db = new PDO(DSN, DB_USER, DB_PASS);
        $sql = "INSERT INTO todos (user_id, title, detail, status, created_at, updated_at, deleted_at) VALUES (:user_id, :title, :detail, :status, :created_at, :updated_at, NULL)";
        $stmt = $db->prepare($sql);
        $stmt->execute(array(':user_id' => $user_id, ':title' => $title, ':detail' => $detail, ':status' => $status, ':created_at' => $created_at, ':updated_at' => $updated_at));
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo $e->getMessage();
        die();
    }

    // DB接続を解除
    $stmt = null;
    $db = null;

    header("Location: ../index.php");
?>
