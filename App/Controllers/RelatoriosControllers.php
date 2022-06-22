<?php

namespace App\Controllers;

session_start();

class RelatoriosControllers
{
    public function index()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/Relatorios/index.php';
    }
}