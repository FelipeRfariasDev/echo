<?php

namespace App\Models;

class Veiculo extends Connection
{

    function __construct()
    {
        $this->login_id = $_SESSION["usuario"]["id"];
    }

    public function index($placa=null,$modelo=null,$marca=null,$autonomia=null)
    {
        $conn = $this->connect();
        $sql = "select * from veiculos WHERE `usuario_id`=$this->login_id";

        if(!empty($placa)){
            $wherePlaca=["placa='$placa'"];
        }
        if(!empty($modelo)){
            $whereModelo=["modelo='$modelo'"];
        }
        if(!empty($marca)){
            $whereMarca=["marca='$marca'"];
        }
        if(!empty($autonomia)){
            $whereAutonomia=["autonomia='$autonomia'"];
        }
        if(!empty($wherePlaca) || !empty($whereModelo) || !empty($whereMarca) || !empty($whereAutonomia)){
            $where = [];
            if(!empty($wherePlaca))         $where[]= implode("",$wherePlaca);
            if(!empty($whereModelo))         $where[]= implode("",$whereModelo);
            if(!empty($whereMarca))         $where[]= implode("",$whereMarca);
            if(!empty($whereAutonomia))     $where[]= implode("",$whereAutonomia);
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
                $placa = $_POST["placa"];
                $modelo = $_POST["modelo"];
                $marca = $_POST["marca"];
                $autonomia = $_POST["autonomia"];

                $conn = $this->connect();
                $sql = "INSERT INTO `veiculos` (`placa`,`modelo`, `marca`, `autonomia`,`usuario_id`) VALUES ('$placa','$modelo', '$marca', '$autonomia',$this->login_id)";
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
        $sql = "select * from veiculos where id=$id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }
    public function update()
    {
        if ($_POST) {
            try {
                $id = $_POST["id"];
                $placa = $_POST["placa"];
                $modelo = $_POST["modelo"];
                $marca = $_POST["marca"];
                $autonomia = $_POST["autonomia"];

                $conn = $this->connect();
                $sql = "UPDATE veiculos SET placa = '$placa',modelo = '$modelo',marca = '$marca',autonomia='$autonomia',usuario_id=$this->login_id WHERE (`id` = $id)";
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

    public function delete()
    {
        try {
            $id = $_GET["id"];
            $conn = $this->connect();
            $sql = "DELETE FROM veiculos WHERE (`id` = $id) and usuario_id=$this->login_id";
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
