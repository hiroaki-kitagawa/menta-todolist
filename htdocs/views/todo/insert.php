<?php
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");

    TodoController::insert();

    header("Location: top.php");
?>
