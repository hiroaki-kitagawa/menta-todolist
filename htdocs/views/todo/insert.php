<?php
    session_start();
    require_once(dirname(__FILE__,3) . "/controller/TodoController.php");
    require_once(dirname(__FILE__,3) . "/validations/validate.php");

    TodoController::insert();

?>
