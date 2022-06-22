<?php

namespace App\Controllers;

session_start();

include ("Controller.php");

class RelatoriosControllers extends \Controllers
{
    private $name_controller;

    function __construct()
    {
        $this->nameController = "Relatorios";
    }

    public function index()
    {
        if($_POST){
            print_r($_POST);
        }

        return self::view("Auth/$this->nameController/index",["nameController"=>$this->nameController]);
    }
}