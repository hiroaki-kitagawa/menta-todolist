<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");
    require_once(dirname(__FILE__,3) . "/controller/validateController.php");

    $id = $_POST["id"];
    $title = $_POST['title'];
    $detail = $_POST['detail'];
    $data = array(
            "title" => $title,
            "detail" => $detail,
        );

    $validation = new Validation;

    $validation->isValid($data);

    if (empty($_SESSION['errormsg'])) {
        TodoController::update();
        session_destroy();
        header("Location: top.php");
    } else {
        header("Location: edit.php?id=" . (int)$id );
    }

?>
