<?php

namespace App\Controllers;

use App\Models\Funcionario;

include ("Controller.php");

session_start();

class FuncionariosControllers extends \Controllers
{
    private $name_controller;

    function __construct()
    {
        $this->nameController = "Funcionarios";
    }

    public function index()
    {
        $nome = "";
        $cpf = "";

        if($_POST){
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
        }

        if(@$_POST["acao"]=="buscar"){
            $nome = $_POST["nome"];
            $cpf = $_POST["cpf"];
        }
        $model = new Funcionario();
        $getData = $model->index($nome,$cpf);
        return self::view("Auth/$this->nameController/index",["getData"=>$getData,"nameController"=>$this->nameController]);
    }

    public function novo()
    {
        if($_POST){
            $model = new Funcionario();
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
            $model = new Funcionario();
            $update = $model->update($id);
            if($update["msg_success"]==true){
                $_SESSION["msgAlteradoSucesso"]=true;
                self::redirect("/$this->nameController/index");
            }else{
                $_SESSION["msgAlteradoErro"]=$update["msg_erros"];
                self::redirect("/$this->nameController/index");
            }
        }
        $model = new Funcionario();
        $getById = $model->getById($id);
        return self::view("Auth/$this->nameController/alterar",["getById"=>$getById,"nameController"=>$this->nameController]);
    }

    public function excluir($id)
    {
        $model = new Funcionario();
        $delete = $model->delete($id);
        if($delete["msg_success"]==true){
            $_SESSION["msgRemovidoSucesso"]=true;
        }else{
            $_SESSION["msgRemovidoErro"]=$delete["msg_erros"];
        }
        self::redirect("/$this->nameController/index");
    }
}