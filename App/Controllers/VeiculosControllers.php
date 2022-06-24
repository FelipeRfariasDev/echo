<?php

namespace App\Controllers;

use App\Models\Veiculo;

include ("Controller.php");

session_start();

class VeiculosControllers extends \Controllers
{
    private $name_controller;

    function __construct()
    {
        $this->nameController = "Veiculos";
    }

    public function index()
    {
        $placa = "";
        $modelo = "";
        $marca = "";
        $autonomia = "";
        if(@$_POST["acao"]=="buscar"){
            $placa = $_POST["placa"];
            $modelo = $_POST["modelo"];
            $marca = $_POST["marca"];
            $autonomia = $_POST["autonomia"];
        }
        $model = new Veiculo();
        $getData = $model->index($placa,$modelo,$marca,$autonomia);
        return self::view("Auth/$this->nameController/index",["getData"=>$getData,"nameController"=>$this->nameController]);
    }

    public function novo()
    {
        if($_POST){
            $model = new Veiculo();
            $novo = $model->novo();
            if($novo["msg_success"]==true){
                $_SESSION["msgAdicionadoSucesso"]=true;
            }else{
                $_SESSION["msgAdicionadoErro"]=$novo["msg_erros"];
            }
            self::redirect("/$this->nameController/index");
        }
        return self::view("/Auth/$this->nameController/novo",["nameController"=>$this->nameController]);


    }

    public function alterar($id)
    {
        if ($_POST) {
            $model = new Veiculo();
            $update = $model->update($id);
            if($update["msg_success"]==true){
                $_SESSION["msgAlteradoSucesso"]=true;
                self::redirect("/$this->nameController/index");
            }else{
                $_SESSION["msgAlteradoErro"]=$update["msg_erros"];
                self::redirect("/$this->nameController/index");
            }
        }
        $model = new Veiculo();
        $getById = $model->getById($id);
        return self::view("Auth/$this->nameController/alterar",["getById"=>$getById,"nameController"=>$this->nameController]);
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