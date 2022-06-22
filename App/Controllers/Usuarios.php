<?php

namespace App\Controllers;

use App\Models\Usuario;

include ("Controller.php");

session_start();

class Usuarios extends \Controllers
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
                    self::redirect("/Site/principal/");
                }else{
                    $_SESSION["cadastroErros"]=true;
                }

            }
        }
        return self::view("login");
    }

    public function novo(){
        if($_POST["tiporequisicao"]=="novo"){
            $usuario = new Usuario();
            $novo = $usuario->novo();
            if($novo["msg_success"]==true){
                $_SESSION["cadastroSuccess"]=true;
                self::redirect("/Usuarios/login/");
            }else{
                $_SESSION["cadastroNovoUsuarioErro"]=$novo["msg_erros"];
                self::redirect("/Usuarios/login/");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        self::redirect("/Usuarios/login/");
    }
}
