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

    public function login()
    {
        $email = $_POST["email"];
        $senha = md5($_POST["senha"]);

        $conn = $this->connect();
        $sql = "select id,cnpj,razao_social,email from usuario where email = '$email' and senha = '$senha'";
        $stmt = $conn->prepare($sql);
        $sucesso = $stmt->execute();
        if (!$sucesso) {
            return[
                "msg_success"=>false,
                "msg_erros"=>$stmt->errorInfo()
            ];
        }
        $result = $stmt->fetch();
        if ($result == true) {
            return[
                "msg_success"=>true,
                "getUsuarios"=>$result
            ];
        }else{
            return[
                "msg_success"=>false
            ];
        }
    }
}