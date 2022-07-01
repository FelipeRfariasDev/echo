<?php

namespace App\Controllers;

use App\Models\Chamado;
use App\Models\Funcionario;
use App\Models\Veiculo;

include ("Controller.php");


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
                "getData"=>$modelChamado->index($km_rodado,$funcionario_id,$veiculo_id),
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
        $modelFuncionario = new Funcionario();
        $modelVeiculo = new Veiculo();

        return self::view(
            "Auth/$this->nameController/novo",
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
        $modelChamado = new Chamado();
        $modelFuncionario = new Funcionario();
        $modelVeiculo = new Veiculo();

        return self::view(
            "Auth/$this->nameController/alterar",
            [
                "getData"=>$modelChamado->getById($id),
                "getVeiculos"=>$modelVeiculo->index(),
                "getFuncionarios"=>$modelFuncionario->index(),
                "nameController"=>$this->nameController
            ]);
    }

    public function excluir($id=null)
    {
        $model = new Veiculo();
        $delete = $model->delete($id);

        if($delete["msg_success"]==true){
            $_SESSION["msgRemovidoSucesso"]=true;
        }else{
            $_SESSION["msgRemovidoErro"]=$delete["msg_erros"];
        }
        self::redirect("/$this->nameController/index");
    }
}
