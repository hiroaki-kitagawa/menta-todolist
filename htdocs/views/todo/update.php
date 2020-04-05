<?php
    session_start();
    include(dirname(__FILE__,3) . "/controller/TodoController.php");

    $id = $_POST["id"];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $_SESSION['errormsg'] = array();
    // バリデーションチェック
    if ($title === '') {
        $_SESSION['errormsg'] = "タイトルが入力されていません。";
    }
    if ($detail === '') {
        $_SESSION['errormsg'] = "内容が入力されていません。";
    }

    if (empty($_SESSION['errormsg'])) {
        TodoController::update();
        session_destroy();
        header("Location: index.php");
    } else {
        header("Location: edit.php?id=" . (int)$id );
    }

?>
