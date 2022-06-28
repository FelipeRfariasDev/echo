<?php

namespace App\Controllers;

use App\Models\Chamado;
use App\Models\Funcionario;
use App\Models\Veiculo;

include ("Controller.php");

session_start();

class ChamadosControllers extends \Controllers
{
    private $name_controller;

    function __construct()
    {
        $this->nameController = "Chamados";
    }

    public function index()
    {
        $km_rodado      = "";
        $funcionario_id    = "";
        $veiculo_id        = "";

        if($_POST){
            if(@$_POST["acao"]=="buscar") {
                $km_rodado = $_POST["km_rodado"];
                $funcionario_id = $_POST["funcionario_id"];
                $veiculo_id = $_POST["veiculo_id"];
            }
        }

        $modelChamado = new Chamado();
        $modelFuncionario = new Funcionario();
        $modelVeiculo = new Veiculo();

        return self::view(
            "Auth/$this->nameController/index",
            [
                "getData"=>$modelChamado->index(),
                "getVeiculos"=>$modelVeiculo->index(),
                "getFuncionarios"=>$modelFuncionario->index(),
                "nameController"=>$this->nameController
            ]);
    }

    public function novo()
    {
        if($_POST){
            $model = new Chamado();
            $novo = $model->novo();

            if($novo["msg_success"]==true){
                $_SESSION["msgAdicionadoSucesso"]=true;
            }else{
                $_SESSION["msgAdicionadoErro"]=$novo["msg_erros"];
            }
            self::redirect("/$this->nameController/index");
        }
        $modelVeiculo = new Veiculo();
        $modelFuncionario = new Funcionario();

        return self::view("/Auth/$this->nameController/novo",
            [
                "getVeiculos"=>$modelVeiculo->index(),
                "getFuncionarios"=>$modelFuncionario->index(),
                "nameController"=>$this->nameController
            ]);
    }

    public function alterar_disponivel($chamados_id,$veiculo_id)
    {
        $model = new Chamado();
        if($model->alterar_disponivel($chamados_id,$veiculo_id)){
            $_SESSION["msgAlteradoSucesso"]=true;
            self::redirect("/$this->nameController/index");
        }
    }

    public function alterar_indisponivel($chamados_id,$veiculo_id)
    {
        $model = new Chamado();
        if($model->alterar_indisponivel($chamados_id,$veiculo_id)){
            $_SESSION["msgAlteradoSucesso"]=true;
            self::redirect("/$this->nameController/index");
        }
    }
}
