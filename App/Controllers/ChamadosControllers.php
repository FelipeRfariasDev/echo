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

        $model = new Chamado();
        $modelVeiculo = new Veiculo();
        $modelFuncionario = new Funcionario();

        return self::view(
            "Auth/$this->nameController/index",
            [
                "getData"=>$model->index($km_rodado,$funcionario_id,$veiculo_id),
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

    public function alterar($id)
    {
        if ($_POST) {
            $model = new Chamado();
            $update = $model->update($id);
            if($update["msg_success"]==true){
                $_SESSION["msgAlteradoSucesso"]=true;
                self::redirect("/$this->nameController/index");
            }else{
                $_SESSION["msgAlteradoErro"]=$update["msg_erros"];
                self::redirect("/$this->nameController/index");
            }
        }
        $model = new Chamado();
        $getById = $model->getById($id);

        $modelVeiculo = new Veiculo();
        $modelFuncionario = new Funcionario();

        return self::view(
            "Auth/$this->nameController/alterar",
            [
                "getVeiculos"=>$modelVeiculo->index(),
                "getFuncionarios"=>$modelFuncionario->index(),
                "getById"=>$getById,
                "nameController"=>$this->nameController
            ]);
    }
}
