<?php
    include(dirname(__FILE__,3) . "/controller/TodoController.php");

    TodoController::insert();
    
    header("Location: index.php");
?>
