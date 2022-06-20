<?php

namespace App\Controllers;

session_start();

class Site
{
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
    //usuário logado
    public function principal()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/principal.php';
    }

    public function funcionarios()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/funcionarios.php';
    }

    public function chamados()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/chamados.php';
    }

}
