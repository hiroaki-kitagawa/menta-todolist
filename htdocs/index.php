<?php
    include 'util.php';

    $sql = "SELECT * FROM todos";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <h1>ToDoリスト</h1>
    <?php foreach ($result as $row) {?>
      <li><?=htmlspecialchars($row["title"], ENT_QUOTES)?></li>
    <?php  }?>
</body>
</html>
