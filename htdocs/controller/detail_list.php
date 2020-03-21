<?php
    include 'model/database.php';

    session_start();

    $id = $_GET["id"];

    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "SELECT * FROM todos WHERE id = " . $id;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
