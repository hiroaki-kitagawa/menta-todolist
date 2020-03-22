<?php
    include '../controller/TodoController.php';

    TodoController::delete();

    header("Location: ../views/index.php");
?>
