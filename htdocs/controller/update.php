<?php
    include '../controller/TodoController.php';

    // バリデーションチェック
    session_start();
    if (empty($_POST["title"])) {
        $_SESSION['errormsg'] = "タイトルが入力されていません。";
    }
    if (empty($_POST["detail"])) {
        $_SESSION['errormsg'] = "内容が入力されていません。";
    }

    if (empty($_SESSION['errormsg'] )) {
        TodoController::update();
        header("Location: ../views/index.php");
    } else {
        return $_SESSION['errormsg'];
    }

?>
