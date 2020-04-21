<?php

class Validation {
    public function isValid($params)
    {
        $_SESSION['errormsg'] = array();
        if ($params['title'] === '') {
            $_SESSION['errormsg']['title'] = "タイトルが入力されていません。";
        } else {
            $_SESSION['success']['title'] = $params['title'];
        }
        if ($params['detail'] === '') {
            $_SESSION['errormsg']['detail'] = "内容が入力されていません。";
        } else {
            $_SESSION['success']['detail'] = $params['detail'];
        }
    }

    public function getData()
    {
        return $_SESSION['success'];
    }

}
