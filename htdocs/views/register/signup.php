<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/UserController.php");
    $errormsg = $_SESSION['errormsg'];
    if (isset($_POST['email'])) {
        UserController::register();
    }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDoリスト</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<h1>新規会員登録</h1>
<?php if( !empty($errormsg)): ?>
    <ul class="error_list">
    <?php foreach( (array)$errormsg as $message ): ?>
        <li><?php echo $message; ?></li>
    <?php endforeach; ?>
    <?php $_SESSION['errormsg'] = '' ?>
    </ul>
<?php endif; ?>
<form action="signup.php" method="post">
<div>
    <label>名前：<label>
    <input type="text" name="name" required>
</div>
<div>
    <label>メールアドレス：<label>
    <input type="text" name="email" required>
</div>
<div>
    <label>パスワード：<label>
    <input type="password" name="pass" required>
</div>
<input type="submit" value="新規登録">
</form>
<p>すでに登録済みの方は<a href="login.php">こちら</a></p>
