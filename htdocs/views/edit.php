<?php
    include '../model/database.php';

    include '../controller/edit_todo.php';

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
        <form action="" method="post">
            <div>
                <label>タイトル</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($row["title"]); ?>">
            </div>

            <div>
                <label>内容</label>
                <textarea name="detail" id="detail" cols="30" rows="10"><?= htmlspecialchars($row["detail"]); ?></textarea>
            </div>

            <div>
                <label>状態</label>
                <?php if((int)$row["status"] === 0) {?>
                    <input type="checkbox" name="status" id="status">未完了
                <?php }else{ ?>
                    <input type="checkbox" name="status" id="status" checked="checked">完了
                <?php } ?>
            </div>
        </form>
    <?php  }?>


    <button><a href="#">更新</a></button>
    <?php
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    ?>
</body>
</html>
