<?php

namespace App\Models;

class Veiculo extends Connection
{
    public function index()
    {
        $conn = $this->connect();
        $sql = "select * from veiculos";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }

    public function insert()
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
                $conn = $this->connect();
                $sql = "UPDATE veiculos SET placa = '$placa',marca = '$marca' WHERE (`id` = $id)";
                $stmt = $conn->prepare($sql);
                $return = $stmt->execute();

                return $return;
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
