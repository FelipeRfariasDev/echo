<?php

abstract class Controllers {
    protected final function view(string $_name, array $vars = []) {
        $_filename = $_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/{$_name}.php";
        if(!file_exists($_filename))
            die("View {$_name} not found!");

        include_once $_filename;
    }

    protected final function redirect(string $to) {
        $url = (isset($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
        $folders = explode('?', $_SERVER['REQUEST_URI'])[0];

        header('Location:' . $url . $folders . '?r=' . $to);
        exit();
    }
}