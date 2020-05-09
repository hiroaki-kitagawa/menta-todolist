<?php
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");


    // ログイン済みか確認
    if(!isset($_SESSION['user_id'])) {
        header('Location: ../login/index.php');
        exit;
    }

    $array = TodoController::detail();
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

    <?php foreach ($array as $element) {?>
        <div>
            <label>タイトル</label>
            <p><?=htmlspecialchars($element["title"], ENT_QUOTES)?></p>
        </div>
        <div>
            <label>内容</label>
            <p><?=htmlspecialchars($element["detail"], ENT_QUOTES)?></p>
        </div>
        <div>
            <label>状態</label>
            <?php if((int)$element["status"] === 0) { ?>
                <p>未完了</p>
            <?php }else{ ?>
                <dd>完了</dd>
            <?php }?>
        </div>
        <button><a href="edit.php?id=<?= htmlspecialchars($element["id"]); ?>">編集</a></button>
    <?php  }?>

    <?php
    echo '<a href="top.php">ToDo一覧へ</a>';
    ?>

</body>
</html>
