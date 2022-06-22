<?php

abstract class Controllers {
    protected final function view(string $_name, array $vars = []) {
        $_filename = $_SERVER["DOCUMENT_ROOT"]."/App/Views/Pages/{$_name}.php";
        if(!file_exists($_filename))
            die("View {$_name} not found!");

        include_once $_filename;
    }

    protected final function redirect(string $to) {
        header('Location:' .$to);
        exit();
    }
}