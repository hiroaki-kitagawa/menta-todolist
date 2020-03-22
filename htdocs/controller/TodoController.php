<?php
include '../model/Todo.php';

class TodoController {
    public function index() {
        // TodoクラスからTODOリストを取得
        $todo = new Todo();
        return $todo->getAll();
    }

    public function detail() {
        $detail = new Todo();
        return $detail->getDetail();
    }

    public function delete() {
        $delete = new Todo();
        return $delete->deleteTodo();
    }
}
