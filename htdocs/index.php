<?php
    include 'model/database.php';

    include 'controller/all_list.php'
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
        <table  width="200">
            <tr>
                <td width="25%"><button>削除</button></td>
                <td width="75%"><a href="detail.php?id=<?php echo htmlspecialchars($row["id"]); ?>"><?=htmlspecialchars($row["title"], ENT_QUOTES)?></a></td>
            </tr>
        </table>
    <?php  }?>

    <button><a href="#">新規作成</a></button>
</body>
</html>
