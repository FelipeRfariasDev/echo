<?php

namespace App\Controllers;

session_start();

class Site
{
    /*
     * Urls permitidas sem autenticação
     */
    public function home()
    {
        require_once __DIR__ . '/../Views/Pages/home.php';
    }

    public function carbono()
    {
        require_once __DIR__ . '/../Views/Pages/carbono.php';
    }

    public function integrantes()
    {
        require_once __DIR__ . '/../Views/Pages/integrantes.php';
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
        require_once __DIR__ . '/../Views/Pages/login.php';
    }
    //Url após login executado com sucesso!
    public function principal()
    {
        require_once __DIR__ . '/../Views/Pages/principal.php';
    }
    /*
     * URLs protegidas pela autenticação
     */
    public function veiculos()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/veiculos.php';
    }

    public function funcionarios()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/funcionarios.php';
    }

    public function chamados()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/chamados.php';
    }
    public function relatorios()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/relatorios.php';
    }
}
