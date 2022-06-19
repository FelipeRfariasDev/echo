<?php

namespace App\Models;

class Usuario extends Connection{

    public function novo()
    {
        if ($_POST) {
            print_r($_POST);
            exit;
            try {
                $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_SPECIAL_CHARS);
                $senha = md5(filter_input(INPUT_POST, 'senha', FILTER_DEFAULT));
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $sexo = filter_input(INPUT_POST, 'sexo', FILTER_DEFAULT);
                $data = filter_input(INPUT_POST, 'data', FILTER_DEFAULT);

                $conn = $this->connect();
                $sql = "insert into tb_pessoa values(default, :usuario, :senha, :email, :sexo, :data_nascimento)";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':usuario', $usuario);
                $stmt->bindParam(':senha', $senha);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':sexo', $sexo);
                $stmt->bindParam(':data_nascimento', $data);
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
        return true;
        $email = filter_input(INPUT_GET, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $senha = md5(filter_input(INPUT_GET, 'senha', FILTER_DEFAULT));

        $conn = $this->connect();
        $sql = "select usuario from tb_pessoa where email = :email and senha = md5(:senha)";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();

        $result = $stmt->fetchAll();
        $rowcount = count($result);

        if ($rowcount == 1) {
            return true;
        }else{
            return false;
        }
    }
}