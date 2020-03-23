<?php
include '../model/Todo.php';

class TodoController {
    public function index()
    {
        // TodoクラスからTODOリストを取得
        $todo = new Todo();
        return $todo->getAll();
    }

    public function detail()
    {
        $detail = new Todo();
        return $detail->getDetail();
    }

    public function delete()
    {
        $delete = new Todo();
        return $delete->deleteTodo();
    }

    public function insert()
    {
        $insert = new Todo();
        return $insert->insertTodo();
    }

    public function edit()
    {
        $detail = new Todo();
        return $detail->editTodo();
    }

    public function update()
    {
        $update = new Todo();
        return $update->updateTodo();
    }
}
