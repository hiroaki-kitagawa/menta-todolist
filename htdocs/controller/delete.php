<?php
    include '../model/database.php';

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

    header("Location: ../index.php");
?>
