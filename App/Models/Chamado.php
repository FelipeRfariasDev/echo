<?php

namespace App\Models;

class Chamado extends Connection
{
    private $nome_table;

    function __construct()
    {
        $this->login_id = $_SESSION["usuario"]["id"];
        $this->nome_table = "chamados";
    }

    public function index($km_rodado=null,$funcionario_id=null,$veiculo_id=null)
    {
        $conn = $this->connect();
        $sql = "SELECT $this->nome_table.id,$this->nome_table.disponivel,$this->nome_table.km_rodado,$this->nome_table.data,veiculos.placa,funcionarios.nome,funcionarios.cpf
            FROM $this->nome_table 
            JOIN veiculos ON (veiculos.id=$this->nome_table.veiculo_id) 
            JOIN funcionarios ON (funcionarios.id=$this->nome_table.funcionario_id) 
         WHERE $this->nome_table.`usuario_id`=$this->login_id";

        if(!empty($km_rodado)){
            $sql .=" AND nome='$km_rodado'";
        }
        if(!empty($funcionario_id)){
            $sql .=" AND funcionario_id='$funcionario_id'";
        }
        if(!empty($veiculo_id)){
            $sql .=" AND veiculo_id='$veiculo_id'";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }

    public function novo()
    {
        if ($_POST) {
            try {
                $km_rodado = $_POST["km_rodado"];
                $funcionario_id = $_POST["funcionario_id"];
                $veiculo_id = $_POST["veiculo_id"];
                $data = date("Y-m-d");

                /*
                    Existe algum registro na tabela de chamados?
                    Se sim então verifica se o veiculo_id está disponivel='S',
                        então se existe e está disponivel então deixa inserir
                    else
                        return[
                            "msg_success"=>false,
                            "msg_erros"=>"Veiculo não está disponível para uso"
                        ];

                */

                $conn = $this->connect();
                $sql = "INSERT INTO $this->nome_table (`km_rodado`,`funcionario_id`,veiculo_id,data,`usuario_id`,disponivel) VALUES ('$km_rodado','$funcionario_id','$veiculo_id','$data',$this->login_id,'N')";
                $stmt = $conn->prepare($sql);
                $sucesso = $stmt->execute();
                if (!$sucesso) {
                    return[
                        "msg_success"=>false,
                        "msg_erros"=>$stmt->errorInfo()
                    ];

                }else{
                    return[
                        "msg_success"=>true
                    ];
                }
            } catch (PDOException $e) {
                return[
                    "msg_success"=>false,
                    "msg_erros"=>$e->getMessage()
                ];
            }
        }
    }

    public function getVeiculosDisponiveis(){
        $conn = $this->connect();
        $sql = "SELECT id,placa,marca,modelo FROM veiculos where id in (SELECT veiculo_id FROM chamados where disponivel='S')";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function alterar_disponivel($id){
        $conn = $this->connect();
        $sql = "UPDATE $this->nome_table SET disponivel='S' WHERE id=$id";
        $stmt = $conn->prepare($sql);
        return $stmt->execute();
    }
}
