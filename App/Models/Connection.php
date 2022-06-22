<?php

namespace App\Models;

abstract class Connection{

    private $dbname = 'mysql:host=localhost;dbname=echo';
    private $user = 'root';
    private $pass = '';

    public $login_id;

    protected function connect(){
        try{
            $conn = new \PDO($this->dbname, $this->user, $this->pass);
            $conn->exec("set names utf8");
            return $conn;
        }catch(\PDOException $erro){
            echo $erro->getMessage();
        }
    }
}