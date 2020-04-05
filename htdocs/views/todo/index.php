<?php
    include(dirname(__FILE__,3) . "/controller/TodoController.php");

    $array = TodoController::index();
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
        <table  width="200">
            <tr>
                <td width="25%">
                <form action="delete.php" method="post">
                    <input type="submit" value="削除">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($element["id"]); ?>">
                </form>
                <td width="75%"><a href="detail.php?id=<?= htmlspecialchars($element["id"]); ?>"><?= htmlspecialchars($element["title"], ENT_QUOTES)?></a></td>
            </tr>
        </table>
    <?php  }?>

    <button><a href="new.php">新規作成</a></button>
</body>
</html>
