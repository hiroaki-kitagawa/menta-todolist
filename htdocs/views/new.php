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
    <form action="" method="post">
        <div>
            <label>タイトル</label>
            <input type="text" id="title" name="title">
        </div>

        <div>
            <label>内容</label>
            <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
        </div>

        <div>
            <label>状態</label>
            <input type="checkbox" name="status" id="status">
        </div>
    </form>




    <?php
    echo '<a href="' . $_SERVER['HTTP_REFERER'] . '">前に戻る</a>';
    ?>

</body>
</html>
