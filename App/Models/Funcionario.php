<?php

namespace App\Models;

class Funcionario extends Connection
{
    private $nome_table;

    function __construct()
    {
        $this->login_id = $_SESSION["usuario"]["id"];
        $this->nome_table = "funcionarios";
    }

    public function index($nome=null,$cpf=null)
    {
        $conn = $this->connect();
        $sql = "select * from $this->nome_table WHERE `usuario_id`=$this->login_id";

        if(!empty($nome)){
            $whereNome=["nome='$nome'"];
        }
        if(!empty($cpf)){
            $whereCpf=["cpf='$cpf'"];
        }
        if(!empty($whereNome) || !empty($whereCpf)){
            $where = [];
            if(!empty($whereNome))         $where[]= implode("",$whereNome);
            if(!empty($whereCpf))         $where[]= implode("",$whereCpf);
            $where = implode(" OR ",$where);
            $sql = $sql . " AND (".$where.")";
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
                $nome = $_POST["nome"];
                $cpf = $_POST["cpf"];
                $conn = $this->connect();
                $sql = "INSERT INTO $this->nome_table (`nome`,`cpf`,`usuario_id`) VALUES ('$nome','$cpf',$this->login_id)";
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
    public function getById($id)
    {
        $conn = $this->connect();
        $sql = "select * from $this->nome_table where id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }
    public function update($id)
    {
        if ($_POST) {
            try {
                $nome = $_POST["nome"];
                $cpf = $_POST["cpf"];
                $conn = $this->connect();
                $sql = "UPDATE $this->nome_table SET nome = '$nome',cpf = '$cpf',usuario_id=$this->login_id WHERE (`id` = $id)";
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
                return true;
            } catch (PDOException $e) {
                return[
                    "msg_success"=>false,
                    "msg_erros"=>$e->getMessage()
                ];
            }
        }
    }

    public function delete($id)
    {
        try {
            $conn = $this->connect();
            $sql = "DELETE FROM $this->nome_table WHERE (`id` = $id) and usuario_id=$this->login_id";
            $stmt = $conn->prepare($sql);
            $sucesso = $stmt->execute();
            if (!$sucesso) {
                return[
                    "msg_success"=>false,
                    "msg_erros"=>$stmt->errorInfo()
                ];
            }else{
                return true;
            }
        } catch (PDOException $e) {
            return[
                "msg_success"=>false,
                "msg_erros"=>$e->getMessage()
            ];
        }
    }
}
