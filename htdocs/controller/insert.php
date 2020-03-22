<?php
    include '../controller/TodoController.php';

    TodoController::insert();

    header("Location: ../views/index.php");
?>
