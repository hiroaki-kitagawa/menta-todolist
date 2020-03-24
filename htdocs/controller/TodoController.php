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
        $id = $_GET["id"];
        $detail = new Todo();
        return $detail->findById($id);
    }

    public function delete()
    {
        $delete = new Todo();
        $id = $_POST["id"];
        return $delete->delete($id);
    }

    public function insert()
    {
        $insert = new Todo();
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        return $insert->insert($title, $detail);
    }

    public function edit()
    {
        $detail = new Todo();
        $id = $_POST["id"];
        return $detail->editTodo($id);
    }

    public function update()
    {
        $update = new Todo();
        $id = $_POST["id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $status = $_POST["status"];
        return $update->update($id, $title, $detail, $status);
    }
}
