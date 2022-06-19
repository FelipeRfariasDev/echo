<?php

namespace App\Controllers;

session_start();

class Site
{
    public function home()
    {
        require_once __DIR__ . '/../Views/home.php';
    }

    public function carbono()
    {
        require_once __DIR__ . '/../Views/carbono.php';
    }

    public function integrantes()
    {
        require_once __DIR__ . '/../Views/integrantes.php';
    }

    public function login()
    {
        if ($_POST) {
            if($_POST["tiporequisicao"]=="novo"){
                //novo usuário
                echo "novo usuário";
                $_SESSION["cadastroSuccess"]=true;



            }
            if($_POST["tiporequisicao"]=="login"){
                //login na aplicação
                echo "executar login na aplicação";
                $_SESSION["cadastroErros"]=true;
            }
            print_r($_POST);
            exit;
        }
        require_once __DIR__ . '/../Views/login.php';
    }

    public function principal()
    {
        require_once __DIR__ . '/../Views/principal.php';
    }

    public function veiculos()
    {
        require_once __DIR__ . '/../Views/veiculos.php';
    }

    public function funcionarios()
    {
        require_once __DIR__ . '/../Views/funcionarios.php';
    }

    public function chamados()
    {
        require_once __DIR__ . '/../Views/chamados.php';
    }
    public function relatorios()
    {
        require_once __DIR__ . '/../Views/relatorios.php';
    }
}
