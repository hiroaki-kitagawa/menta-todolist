<?php
    include 'model/database.php';

    include 'controller/detail_list.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <?php include("views/header.php")  ?>

    <?php foreach ($result as $row) {?>
        <dl>
            <dt>タイトル</dt>
            <dd><?=htmlspecialchars($row["title"], ENT_QUOTES)?></dd>
            <dt>内容</dt>
            <dd><?=htmlspecialchars($row["detail"], ENT_QUOTES)?></dd>
            <dt>状態</dt>
            <?php if((int)$row["status"] === 0) { ?>
                <dd>未完了</dd>
            <?php }else{ ?>
                <dd>完了</dd>
            <?php }?>
        </dl>

    <?php  }?>

    <?php
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    ?>

</body>
</html>
