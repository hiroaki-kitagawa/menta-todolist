<?php
session_start();
require_once(dirname(__FILE__,2) . "/model/Todo.php");
require_once(dirname(__FILE__,2) . "/validations/todoValidation.php");

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

        if($delete->findById($id)){
            return $delete->delete($id);
        } else {
            header("Location: top.php");
        }

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
        $validation = new todoValidation;

        //生成したインスタンスにパラメータをセット
        $validation->setData($data);
        //バリデーション
        //バリデーションがOKなら
        if ($validation->isValid()) {
            $valid_data = $validation->getData();
            $title = $valid_data['title'];
            $detail = $valid_data['detail'];
            $todo->insert($title, $detail);
            header("Location: top.php");
        } else {
            //NGなら？
            $_SESSION['title'] = $title;
            $_SESSION['detail'] = $detail;
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

        $validation = new todoValidation;

        $validation->setData($data);

        if ($validation->isValid()) {
            $valid_data = $validation->getData();
            $title = $valid_data['title'];
            $detail = $valid_data['detail'];
            $todo->update($id, $title, $detail, $status);
            header("Location: top.php");
        } else {
            header("Location: edit.php?id=" . (int)$id );
        }

    }
}
