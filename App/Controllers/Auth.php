<?php
session_start();
if(empty($_SESSION)){
    if($_SERVER["REQUEST_URI"]!="/Usuarios/login"){
        header('Location: /Usuarios/login');
        exit();
    }
}