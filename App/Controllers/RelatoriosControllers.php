<?php

namespace App\Controllers;

use App\Models\Relatorio;

session_start();

include ("Controller.php");

class RelatoriosControllers extends \Controllers
{
    private $nameController;
    private $modelRelatorio;

    function __construct()
    {
        $this->nameController = "Relatorios";
        $this->modelRelatorio = new Relatorio();
    }

    public function index()
    {
        if($_POST){
            self::redirect("/".$this->nameController."/".$_POST["tipo_relatorio"]."/".$_POST["data_inicio"]."/".$_POST["data_fim"]);
        }
        return self::view("Auth/$this->nameController/index",["nameController"=>$this->nameController]);
    }

    public function km_rodado_veiculo($data_inicio,$data_fim)
    {
        $getData = $this->modelRelatorio->km_rodado_veiculo($data_inicio,$data_fim);
        $getIntervaloData = ["inicio"=>$data_inicio,"fim"=>$data_fim];

        return self::view(
            "Auth/$this->nameController/km_rodado_veiculo",
            [
                "nameController"=>$this->nameController,
                "getData"=>$getData,
                "getIntervaloData"=>$getIntervaloData
            ]
        );
    }
    public function consumo_veiculo_funcionario($data_inicio,$data_fim){

        $getData = $this->modelRelatorio->consumo_veiculo_funcionario($data_inicio,$data_fim);
        $getIntervaloData = ["inicio"=>$data_inicio,"fim"=>$data_fim];

        return self::view(
            "Auth/$this->nameController/consumo_veiculo_funcionario",
            [
                "nameController"=>$this->nameController,
                "getData"=>$getData,
                "getIntervaloData"=>$getIntervaloData
            ]
        );
    }

    public function consumo_km_funcionario($data_inicio,$data_fim)
    {
        $getData = $this->modelRelatorio->consumo_km_funcionario($data_inicio,$data_fim);
        $getIntervaloData = ["inicio"=>$data_inicio,"fim"=>$data_fim];

        return self::view(
            "Auth/$this->nameController/consumo_km_funcionario",
            [
                "nameController"=>$this->nameController,
                "getData"=>$getData,
                "getIntervaloData"=>$getIntervaloData
            ]
        );
    }
}