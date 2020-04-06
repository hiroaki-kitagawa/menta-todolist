<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");

    $id = $_POST["id"];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $_SESSION['errormsg'] = array();
    // バリデーションチェック
    if ($title === '') {
        $_SESSION['errormsg']['title'] = "タイトルが入力されていません。";
    }
    if ($detail === '') {
        $_SESSION['errormsg']['detail'] = "内容が入力されていません。";
    }

    if (empty($_SESSION['errormsg'])) {
        TodoController::update();
        session_destroy();
        header("Location: top.php");
    } else {
        header("Location: edit.php?id=" . (int)$id );
    }

?>
