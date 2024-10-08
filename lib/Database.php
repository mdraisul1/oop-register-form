<?php 

class Database{
    //DB Params 
    private $host = "localhost";
    private $user = "root";
    private $pass = "password";
    private $dbname = "php_crud";
    public $pdo;

    //DB Connect
    public function __construct(){
        if(!isset($this->pdo)){
            try{
                $link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user, $this->pass);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;
            }catch(PDOException $e){
                die("error in connection". $e->getMessage());
            }
        }
    }

}

