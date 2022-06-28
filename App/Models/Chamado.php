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
        $sql = "SELECT veiculos.id as veiculo_id,chamados.id as chamados_id,chamados.km_rodado,chamados.data,veiculos.placa,funcionarios.nome,funcionarios.cpf,veiculos.disponivel as veiculos_disponivel,chamados.disponivel as chamados_disponivel FROM chamados JOIN veiculos ON (veiculos.id=chamados.veiculo_id) JOIN funcionarios ON (funcionarios.id=chamados.funcionario_id) WHERE chamados.`usuario_id`=$this->login_id";

        if(!empty($km_rodado)){
            $sql .=" AND nome='$km_rodado'";
        }
        if(!empty($funcionario_id)){
            $sql .=" AND funcionario_id='$funcionario_id'";
        }
        if(!empty($veiculo_id)){
            $sql .=" AND veiculo_id='$veiculo_id'";
        }
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }

    public function getVeiculoDisponivel($veiculo_id){
        $conn = $this->connect();
        $sql = "SELECT count(id) as qtd FROM veiculos where id=$veiculo_id and disponivel='S'";
        //echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function novo()
    {
        if ($_POST) {
            $km_rodado = $_POST["km_rodado"];
            $funcionario_id = $_POST["funcionario_id"];
            $veiculo_id = $_POST["veiculo_id"];
            $data = date("Y-m-d");

            $getVeiculoDisponivel = $this->getVeiculoDisponivel($veiculo_id);
            $qtdDisponivel = ($getVeiculoDisponivel[0]["qtd"]);

            if($qtdDisponivel==1){

                $this->insert($km_rodado,$funcionario_id,$veiculo_id,$data);
                return[
                    "msg_success"=>true
                ];
            }else{
                return[
                    "msg_success"=>false,
                    "msg_erros"=>"Esse Veículo não está disponível"
                ];
            }
        }
    }

    private function insert($km_rodado,$funcionario_id,$veiculo_id,$data){
        try {

            $conn = $this->connect();
            $sql = "INSERT INTO chamados (`km_rodado`,`funcionario_id`,veiculo_id,data,`usuario_id`,disponivel) VALUES ('$km_rodado','$funcionario_id','$veiculo_id','$data',$this->login_id,'N')";
            //echo $sql;
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute()) {
                return[
                    "msg_success"=>false,
                    "msg_erros"=>$stmt->errorInfo()
                ];

            }else{
                $conn = $this->connect();
                $sql = "UPDATE veiculos SET disponivel='N' WHERE id=$veiculo_id";
                //echo $sql;
                //exit;
                $stmt = $conn->prepare($sql);
                if($stmt->execute()){
                    return[
                        "msg_success"=>true
                    ];
                }
            }
        } catch (PDOException $e) {
            return[
            "msg_success"=>false,
            "msg_erros"=>$e->getMessage()
            ];
        }
    }

    public function alterar_disponivel($chamados_id,$veiculo_id){
        $conn = $this->connect();
        $sql = "UPDATE veiculos SET disponivel='S' WHERE id=$veiculo_id";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $conn = $this->connect();
            $sql = "UPDATE chamados SET disponivel='S' WHERE id=$chamados_id";
            $stmt = $conn->prepare($sql);
            return $stmt->execute();
        }
    }

    public function alterar_indisponivel($chamados_id,$veiculo_id){
        $conn = $this->connect();
        $sql = "UPDATE veiculos SET disponivel='N' WHERE id=$veiculo_id";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()){
            $conn = $this->connect();
            $sql = "UPDATE chamados SET disponivel='N' WHERE id=$chamados_id";
            $stmt = $conn->prepare($sql);
            return $stmt->execute();
        }
    }
}
