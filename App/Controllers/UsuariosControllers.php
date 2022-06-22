<?php

namespace App\Controllers;

use App\Models\Usuario;

include ("Controller.php");

session_start();

class UsuariosControllers extends \Controllers
{
    private $name_controller;

    function __construct()
    {
        $this->nameController = "Usuarios";
    }

    public function login()
    {
        if ($_POST) {
            if($_POST["tiporequisicao"]=="login"){
                $usuario = new Usuario();
                $data = $usuario->login();

                if($data["msg_success"]==true){
                    session_id($data['id']);
                    $_SESSION["usuario"]=$data["getUsuarios"];

                    $_SESSION["msgLoginSucesso"]="Login Realizado com Sucesso!";

                    self::redirect("/Site/principal/");
                }else{
                    $_SESSION["msgLoginErro"]=true;
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
                $_SESSION["msgAdicionadoSucesso"]=true;
                self::redirect("/$this->nameController/login/");
            }else{
                $_SESSION["msgAdicionadoErro"]=$novo["msg_erros"];
                self::redirect("/$this->nameController/login/");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        self::redirect("/$this->nameController/login/");
    }
}
