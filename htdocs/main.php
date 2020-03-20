<?php
    include 'database.php';

    session_start();

    // ユーザーIDを一時的に定義
    $id = 1;

    $db = new PDO(DSN, DB_USER, DB_PASS);
    $sql = "SELECT * FROM todos WHERE user_id = " . $id;
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    var_dump($result);
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <?php include("header.php")  ?>
    <?php foreach ($result as $row) {?>
        <table  width="200">
            <tr>
                <td width="25%"><button>削除</button></td>
                <td width="75%"><?=htmlspecialchars($row["title"], ENT_QUOTES)?></td>
            </tr>
        </table>
    <?php  }?>

    <button><a href="#">新規作成</a></button>
</body>
</html>
