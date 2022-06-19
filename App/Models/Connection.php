<?php

namespace App\Models;

abstract class Connection{

    protected function connect(){   
        try{
            $dbname = getenv('DB_CONNECTION').":host=".getenv('DB_HOST').";dbname=".getenv('DB_DATABASE').";port=".getenv('DB_PORT');
            $conn = new \PDO($dbname, getenv('DB_USERNAME'), getenv('DB_PASSWORD'));
            $conn->exec("set names utf8");
            return $conn;
        }catch(\PDOException $erro){
            echo $erro->getMessage();
        }
    }
}