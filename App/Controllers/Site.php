<?php

namespace App\Controllers;

use App\Models\Usuario;
use App\Models\Veiculo;
use http\Header;

session_start();

class Site
{
    /*
     * Urls permitidas sem autenticação
     */
    public function home()
    {
        require_once __DIR__ . '/../Views/Pages/home.php';
    }

    public function carbono()
    {
        require_once __DIR__ . '/../Views/Pages/carbono.php';
    }

    public function integrantes()
    {
        require_once __DIR__ . '/../Views/Pages/integrantes.php';
    }

    public function login()
    {
        if ($_POST) {
            if($_POST["tiporequisicao"]=="novo"){

                $usuario = new Usuario();
                $novo = $usuario->novo();
                if($novo==true){
                    $_SESSION["cadastroSuccess"]=true;

                }else{
                    echo "erro ao tentar cadastrar o usuário";
                    exit;
                }
            }
            if($_POST["tiporequisicao"]=="login"){
                $usuario = new Usuario();
                $data = $usuario->login();
                if($data!=false){
                    session_id($data['id']);
                    $_SESSION["usuario"]=$data;
                    Header("Location: ?router=Site/principal/");
                }else{
                    //erro de login, usuário e senha não encontrado
                    $_SESSION["cadastroErros"]=true;
                }
            }
        }
        require_once __DIR__ . '/../Views/Pages/login.php';
    }
    //Url após login executado com sucesso!

    public function logout()
    {
        session_destroy();
        Header("Location: ?router=Site/login/");
    }

    public function principal()
    {
        /*
         Todas informações do usuário estão disponiveis na session da seguinte forma:
        echo "id: ".$_SESSION["usuario"]["id"]."<br>";
        echo "cnpj: ".$_SESSION["usuario"]["cnpj"]."<br>";
        echo "razao_social: ".$_SESSION["usuario"]["razao_social"]."<br>";
        echo "email: ".$_SESSION["usuario"]["email"]."<br>";
        */
        require_once __DIR__ . '/../Views/Pages/Auth/principal.php';
    }
    /*
     * URLs protegidas pela autenticação
     */
    public function veiculos()
    {
        if(@$_GET["tiporequisicao"]=="excluir"){
            $veiculo = new Veiculo();
            $delete = $veiculo->delete();
            if($delete==true){
                $_SESSION["msgVeiculoRemovidoSucesso"]=true;
                $getVeiculos = $veiculo->index();
                $_SESSION["getVeiculos"]=$getVeiculos;
            }
        }
        $veiculo = new Veiculo();
        $getVeiculos = $veiculo->index();
        $_SESSION["getVeiculos"]=$getVeiculos;
        require_once __DIR__ . "/../Views/Pages/Auth/Veiculos/index.php";
    }

    public function veiculosNovo()
    {
        if ($_POST) {
            if($_POST["tiporequisicao"]=="novo"){
                $veiculo = new Veiculo();
                $insert = $veiculo->insert();
                if($insert==true){
                    $_SESSION["msgVeiculoAdicionadoSucesso"]=true;
                    Header("Location: ?router=Site/veiculos");
                }
            }
        }


        require_once __DIR__ . "/../Views/Pages/Auth/Veiculos/novo.php";
    }

    public function veiculosAlterar()
    {

        if ($_POST) {
            if($_POST["tiporequisicao"]=="update"){
                $veiculo = new Veiculo();
                $update = $veiculo->update();
                if($update==true){
                    $_SESSION["msgVeiculoAlteradoSucesso"]=true;
                }
            }
        }
        $veiculo = new Veiculo();
        @$getByIdVeiculo = $veiculo->getById($_GET["id"]);
        $_SESSION["getByIdVeiculo"]=$getByIdVeiculo;
        require_once __DIR__ . "/../Views/Pages/Auth/Veiculos/alterar.php";
    }

    public function funcionarios()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/funcionarios.php';
    }

    public function chamados()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/chamados.php';
    }
    public function relatorios()
    {
        require_once __DIR__ . '/../Views/Pages/Auth/relatorios.php';
    }
}
