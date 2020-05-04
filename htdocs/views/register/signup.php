<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/UserController.php");

    if (isset($_POST['email'])) {
        UserController::register();
    }

?>
<h1>新規会員登録</h1>
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
