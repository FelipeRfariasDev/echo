<?php

namespace App\Models;

class Usuario extends Connection{

    public function novo()
    {
        if ($_POST) {
            try {
                $cnpj = $_POST["cnpj"];
                $razao_social = $_POST["razao_social"];
                $email = $_POST["email"];
                $senha = md5($_POST["senha"]);

                $conn = $this->connect();

                $sql = "insert into usuario values(default, :cnpj, :razao_social, :email, :senha)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':cnpj', $cnpj);
                $stmt->bindParam(':razao_social', $razao_social);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':senha', $senha);
                $stmt->execute();

                return true;
            } catch (\PDOException $e) {
                return false;
            }
        }
        return false;
    }

    public function login()
    {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        $conn = $this->connect();
        $sql = "select id,cnpj,razao_social,email from usuario where email = :email and senha = (:senha)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        $result = $stmt->fetch();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }
}