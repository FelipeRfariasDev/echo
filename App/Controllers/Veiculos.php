<?php

namespace App\Controllers;

use App\Models\Veiculo;

include ("Controller.php");

session_start();

class Veiculos extends \Controllers
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
        return self::view("Auth/Veiculos/index",["getVeiculos"=>$getVeiculos]);
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
            self::redirect("/Veiculos/index");
        }
        return self::view("/Auth/Veiculos/novo");


    }

    public function alterar()
    {
        if ($_POST) {
            $veiculo = new Veiculo();
            $update = $veiculo->update();
            if($update["msg_success"]==true){
                $_SESSION["msgVeiculoAlteradoSucesso"]=true;
                self::redirect("/Veiculos/index");
            }else{
                $_SESSION["msgVeiculoAlteradoErro"]=$update["msg_erros"];
                self::redirect("/Veiculos/index");
            }
        }
        $veiculo = new Veiculo();
        $getByIdVeiculo = $veiculo->getById($_GET["id"]);
        return self::view("Auth/Veiculos/alterar",["getByIdVeiculo"=>$getByIdVeiculo]);
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
        self::redirect("/Veiculos/index");
    }
}