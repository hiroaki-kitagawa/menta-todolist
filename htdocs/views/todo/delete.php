<?php
    include(dirname(__FILE__,3) . "/controller/TodoController.php");

    TodoController::delete();

    header("Location: index.php");
?>
