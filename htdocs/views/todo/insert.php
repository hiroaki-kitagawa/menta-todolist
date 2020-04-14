<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");
    require_once(dirname(__FILE__,3) . "/controller/validateController.php");

    $title = $_POST["title"];
    $detail = $_POST["detail"];
    $data = array(
        "title" => $title,
        "detail" => $detail,
    );

    $validation = new Validation;

    // バリデーションクラスのインスタンスにパラメータをセット
    $validation->isValid($data);

    if (empty($_SESSION['errormsg'])) {
        TodoController::insert();
        session_destroy();
        header("Location: top.php");
    } else {
        header("Location: new.php" );
    }
?>
