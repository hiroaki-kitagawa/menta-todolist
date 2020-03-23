<?php
    include '../controller/TodoController.php';

    TodoController::update();

    header("Location: ../views/index.php");
?>
