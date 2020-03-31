<?php
include '../model/Todo.php';
include 'validation.php';

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
        $id = $_POST["id"];
        return $detail->findById($id);
    }

    public function update()
    {
        $id = $_POST["id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $status = $_POST["status"];

        // バリデーションチェック
        $errormsg = array();
        if (empty($title)) {
            $errormsg[] = "タイトルが入力されていません。";
        }
        if (empty($detail)) {
            $errormsg[] = "内容が入力されていません。";
        }

        // エラーがなければ更新処理を行う
        if ( empty($errormsg)) {
            $todo = new Todo();
            return $todo->update($id, $title, $detail, $status);
        }
    }
}
