<?php
    include '../model/database.php';
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
        <form action="../controller/update.php" method="post">
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
                    <select name="status" id="status">
                        <option value="0" selected="selected">未完了</option>
                        <option value="1">完了</option>
                    </select>
                <?php }else{ ?>
                    <select name="status" id="status">
                        <option value="0">未完了</option>
                        <option value="1" selected="selected">完了</option>
                    </select>
                <?php } ?>
            </div>
            <button type="submit">更新</button>
        </form>
    <?php  }?>

    <?php
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    ?>
</body>
</html>
