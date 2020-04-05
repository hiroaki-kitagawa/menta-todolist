<?php
include(dirname(__FILE__,2) . "/model/Todo.php");

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
        $todo = new Todo();
        $error = array();
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        if (empty($title)) {
            $error[] = "「タイトル」は入力必須です。";
        }

        return $todo->insert($title, $detail, $error);
    }

    public function edit()
    {
        $detail = new Todo();
        $id = $_GET["id"];
        return $detail->findById($id);
    }

    public function update()
    {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $status = $_POST["status"];

        // エラーがなければ更新処理を行う
        if ( empty($errormsg)) {
            $todo = new Todo();
            return $todo->update($id, $title, $detail, $status);
        }
    }
}
