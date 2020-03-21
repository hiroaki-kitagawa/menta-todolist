<?php
    include 'model/database.php';

    session_start();

    // ユーザーIDを一時的に定義
    $id = 1;

    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "SELECT * FROM todos WHERE user_id = " . $id;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($result);
?>
