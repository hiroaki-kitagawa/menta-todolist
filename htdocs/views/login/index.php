<?php
    session_start();
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
<h1>ログインページ</h1>
<?php if( !empty($errormsg)): ?>
    <ul class="error_list">
    <?php foreach( (array)$errormsg as $message ): ?>
        <li><?php echo $message; ?></li>
    <?php endforeach; ?>
    <?php $_SESSION['errormsg'] = '' ?>
    </ul>
<?php endif; ?>
<form action="login.php" method="post">
<div>
    <label>メールアドレス：<label>
    <input type="text" name="mail" required>
</div>
<div>
    <label>パスワード：<label>
    <input type="password" name="pass" required>
</div>
<input type="submit" value="ログイン">
</form>

<p>新規登録は<a href="../register/signup.php">こちら</a></p>
