<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");
    $errormsg = $_SESSION['errormsg'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <?php include("header.php")  ?>
    <?php if( !empty($errormsg)): ?>
        <ul class="error_list">
        <?php foreach( (array)$errormsg as $message ): ?>
            <li><?php echo $message; ?></li>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form action="insert.php" method="post">
        <div>
            <label>タイトル</label>
            <input type="text" id="title" name="title">
        </div>

        <div>
            <label>内容</label>
            <textarea name="detail" id="detail" cols="30" rows="10"></textarea>
        </div>

        <button type="submit">作成</button>
    </form>

    <?php
        echo '<a href="top.php">TODO一覧へ</a>';
    ?>

</body>
</html>
