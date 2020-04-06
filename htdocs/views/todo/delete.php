<?php
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");

    TodoController::delete();

    header("Location: top.php");
?>
