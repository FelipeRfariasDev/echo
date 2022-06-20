<?php

namespace App\Models;

class Veiculo extends Connection
{
    public function index($placa=null,$marca=null,$autonomia=null)
    {
        $conn = $this->connect();
        $sql = "select * from veiculos";

        if(!empty($placa)){
            $wherePlaca=["placa='$placa'"];
        }
        if(!empty($marca)){
            $whereMarca=["marca='$marca'"];
        }
        if(!empty($autonomia)){
            $whereAutonomia=["autonomia='$autonomia'"];
        }
        if(!empty($wherePlaca) || !empty($whereMarca) || !empty($whereAutonomia)){
            $where = [];
            if(!empty($wherePlaca))         $where[]= implode("",$wherePlaca);
            if(!empty($whereMarca))         $where[]= implode("",$whereMarca);
            if(!empty($whereAutonomia))     $where[]= implode("",$whereAutonomia);
            $where = implode(" OR ",$where);
            $sql = $sql . " WHERE ".$where;
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
        //$sql = "INSERT INTO `veiculos` (`id`, `placa`, `marca`, `autonomia`) VALUES (NULL, 'MER-1839', 'Maserati', '60')";
        //$sql = "INSERT INTO `veiculos` (`id`, `placa`, `marca`, `autonomia`) VALUES (NULL, 'HOX-7464', 'GREAT WALL', '60')";
        //$sql = "INSERT INTO `veiculos` (`id`, `placa`, `marca`, `autonomia`) VALUES (NULL, 'JUN-7472', 'AM Gen', '55')";

        if ($_POST) {
            try {
                $placa = $_POST["placa"];
                $marca = $_POST["marca"];
                $autonomia = $_POST["autonomia"];

                $conn = $this->connect();
                $sql = "INSERT INTO `veiculos` (`placa`, `marca`, `autonomia`) VALUES ('$placa', '$marca', '$autonomia')";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                return true;
            } catch (\PDOException $e) {
                return false;
            }
        }
        return false;

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
                $marca = $_POST["marca"];
                $autonomia = $_POST["autonomia"];

                $conn = $this->connect();
                $sql = "UPDATE veiculos SET placa = '$placa',marca = '$marca',autonomia='$autonomia' WHERE (`id` = $id)";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                return true;
            } catch (\PDOException $e) {
                return false;
            }
        }
        return false;
    }

    public function delete()
    {
            try {
                $id = $_GET["id"];
                $conn = $this->connect();
                $sql = "DELETE FROM veiculos WHERE (`id` = $id)";
                $stmt = $conn->prepare($sql);
                $stmt->execute();

                return true;
            } catch (\PDOException $e) {
                return false;
            }
        return false;
    }
}
