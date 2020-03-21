<?php
    include '../model/database.php';

    include '../controller/show_detail.php';

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
</head>
<body>
    <?php include("../views/header.php")  ?>

    <?php foreach ($result as $row) {?>
        <div>
            <label>タイトル</label>
            <p><?=htmlspecialchars($row["title"], ENT_QUOTES)?></p>
        </div>
        <div>
            <label>内容</label>
            <p><?=htmlspecialchars($row["detail"], ENT_QUOTES)?></p>
        </div>
        <div>
            <label>状態</label>
            <?php if((int)$row["status"] === 0) { ?>
                <p>未完了</p>
            <?php }else{ ?>
                <dd>完了</dd>
            <?php }?>
        </div>
        <form action="controller/edit.php" method="post">
            <input type="submit" value="編集">
            <input type="hidden" name="id" value="<?= htmlspecialchars($row["id"]); ?>">
        </form>
    <?php  }?>

    <?php
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    ?>

</body>
</html>
