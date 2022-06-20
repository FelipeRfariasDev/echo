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
                if($data!=false){
                    session_id($data['id']);
                    $_SESSION["usuario"]=$data;
                    Header("Location: /Site/principal/");
                }else{
                    //erro de login, usuário e senha não encontrado
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
            if($novo==true){
                $_SESSION["cadastroSuccess"]=true;
                Header("Location: /Usuarios/login/");
            }else{
                echo "erro ao tentar cadastrar o usuário";
                exit;
            }
        }
    }

    public function logout()
    {
        session_destroy();
        Header("Location: /Usuarios/login/");
    }
}
