<?php

namespace App\Controllers;

use App\Models\Usuario;

session_start();

class Usuarios
{
    public function login()
    {
        if ($_POST) {
            if($_POST["tiporequisicao"]=="login"){
                $usuario = new Usuario();
                $data = $usuario->login();

                if($data["msg_success"]==true){
                    session_id($data['id']);
                    $_SESSION["usuario"]=$data["getUsuarios"];
                    Header("Location: /Site/principal/");
                }else{
                    $_SESSION["cadastroErros"]=true;
                }

            }
        }
        require_once __DIR__ . '/../Views/Pages/login.php';
    }

    public function novo(){
        if($_POST["tiporequisicao"]=="novo"){
            $usuario = new Usuario();
            $novo = $usuario->novo();
            print_r($novo);
            if($novo["msg_success"]==true){
                $_SESSION["cadastroSuccess"]=true;
                Header("Location: /Usuarios/login/");
            }else{
                $_SESSION["cadastroNovoUsuarioErro"]=$novo["msg_erros"];
                Header("Location: /Usuarios/login/");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        Header("Location: /Usuarios/login/");
    }
}
