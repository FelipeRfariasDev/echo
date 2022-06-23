<?php

namespace App\Models;

class Relatorio extends Connection
{
    function __construct()
    {
        $this->login_id = $_SESSION["usuario"]["id"];
    }

    public function km_rodado_veiculo($data_inicio,$data_fim)
    {
        $conn = $this->connect();
        $sql = "SELECT 
                chamados.data,
                sum(chamados.km_rodado) as total_km_rodado,
                veiculos.placa,
                veiculos.modelo,
                veiculos.marca
            FROM
                chamados
                    JOIN
                veiculos ON (veiculos.id = chamados.veiculo_id)
            WHERE
                chamados.data >= '$data_inicio' AND chamados.data <= '$data_fim' and chamados.usuario_id=$this->login_id group by veiculos.id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result == true) {
            return $result;
        }else{
            return false;
        }
    }
}
