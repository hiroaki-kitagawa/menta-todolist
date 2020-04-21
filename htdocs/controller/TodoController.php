<?php
session_start();
require_once(dirname(__FILE__,2) . "/model/Todo.php");
require_once(dirname(__FILE__,2) . "/validations/validate.php");


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
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $data = array(
            "title" => $title,
            "detail" => $detail,
        );

        //validation クラスのインスタンス生成
        $validation = new Validation;

        //生成したインスタンスにパラメータをセット
        $validation->isValid($data);
        //バリデーション
        //バリデーションがOKなら
        if (empty($_SESSION['errormsg'])) {
            $valid_data = $validation->getData();
            $title = $valid_data['title'];
            $detail = $valid_data['detail'];
            $todo->insert($title, $detail);
            session_destroy();
            header("Location: top.php");
        } else {
            //NGなら？
            header("Location: new.php");
        }

    }

    public function edit()
    {
        $detail = new Todo();
        $id = $_GET["id"];
        return $detail->findById($id);
    }

    public function update()
    {
        $todo = new Todo();
        $id = $_POST["id"];
        $title = $_POST["title"];
        $detail = $_POST["detail"];
        $status = $_POST["status"];
        $data = array(
            "title" => $title,
            "detail" => $detail,
        );

        $validation = new Validation;

        $validation->isValid($data);

        if (empty($_SESSION['errormsg'])) {
            $valid_data = $validation->getData();
            $title = $valid_data['title'];
            $detail = $valid_data['detail'];
            $todo->update($id, $title, $detail, $status);
            session_destroy();
            header("Location: top.php");
        } else {
            header("Location: edit.php?id=" . (int)$id );
        }

    }
}
