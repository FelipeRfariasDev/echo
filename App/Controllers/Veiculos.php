<?php

namespace App\Controllers;

use App\Models\Veiculo;

session_start();

class Veiculos
{
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
        $veiculo = new Veiculo();
        $getVeiculos = $veiculo->index($placa,$modelo,$marca,$autonomia);
        $_SESSION["getVeiculos"]=$getVeiculos;
        require_once __DIR__ . "/../Views/Pages/Auth/Veiculos/index.php";
    }

    public function novo()
    {
        if($_POST){
            $veiculo = new Veiculo();
            $novo_veiculo = $veiculo->novo();
            if($novo_veiculo["msg_success"]==true){
                $_SESSION["msgVeiculoAdicionadoSucesso"]=true;
            }else{
                $_SESSION["msgVeiculoAdicionadoErro"]=$novo_veiculo["msg_erros"];
            }
            Header("Location: /Veiculos/index");
        }
        require_once __DIR__ . "/../Views/Pages/Auth/Veiculos/novo.php";
    }

    public function alterar()
    {
        if ($_POST) {
            $veiculo = new Veiculo();
            $update = $veiculo->update();
            if($update["msg_success"]==true){
                $_SESSION["msgVeiculoAlteradoSucesso"]=true;
                Header("Location: /Veiculos/index");
            }else{
                $_SESSION["msgVeiculoAlteradoErro"]=$update["msg_erros"];
                Header("Location: /Veiculos/index");
            }
        }
        $veiculo = new Veiculo();
        $getByIdVeiculo = $veiculo->getById($_GET["id"]);
        $_SESSION["getByIdVeiculo"]=$getByIdVeiculo;
        require_once __DIR__ . "/../Views/Pages/Auth/Veiculos/alterar.php";
    }

    public function excluir()
    {
        $veiculo = new Veiculo();
        $delete = $veiculo->delete();
        if($delete["msg_success"]==true){
            $_SESSION["msgVeiculoRemovidoSucesso"]=true;
            $getVeiculos = $veiculo->index();
            $_SESSION["getVeiculos"]=$getVeiculos;
        }else{
            $_SESSION["msgVeiculoRemovidoErro"]=$delete["msg_erros"];
        }
        Header("Location: /Veiculos/index");
    }
}