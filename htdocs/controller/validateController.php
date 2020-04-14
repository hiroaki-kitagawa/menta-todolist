<?php

class Validation {
    public function isValid($params)
    {
        $_SESSION['errormsg'] = array();
        if ($params['title'] === '') {
            $_SESSION['errormsg']['title'] = "タイトルが入力されていません。";
        }
        if ($params['detail'] === '') {
            $_SESSION['errormsg']['detail'] = "内容が入力されていません。";
        }
    }

}
