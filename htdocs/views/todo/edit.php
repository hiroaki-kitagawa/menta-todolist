<?php
    session_start();
    include(dirname(__FILE__,3) . "/controller/TodoController.php");
    $array = TodoController::edit();
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
    <form action="update.php" method="post">
        <?php foreach ($array as $element) {?>
            <div>
                <label>タイトル</label>
                <input type="text" id="title" name="title" value="<?= htmlspecialchars($element["title"]); ?>">
            </div>

            <div>
                <label>内容</label>
                <textarea name="detail" id="detail" cols="30" rows="10"><?= htmlspecialchars($element["detail"]); ?></textarea>
            </div>

            <div>
                <label>状態</label>
                <?php if((int)$element["status"] === 0) {?>
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
            <input type="hidden" name="id" value="<?= htmlspecialchars(
                $element["id"]); ?>">
        <?php  }?>
    </form>

    <?php
    echo '<a href="index.php">TODO一覧へ</a>';
    ?>
</body>
</html>
