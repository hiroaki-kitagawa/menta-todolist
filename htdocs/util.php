<?php
    try {
        # hostには「docker-compose.yml」で指定したコンテナ名を記載
        $dsn = "mysql:host=mysql;dbname=todolist;";
        $db = new PDO($dsn, 'root', 'password');

        
        // var_dump($result);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
?>
