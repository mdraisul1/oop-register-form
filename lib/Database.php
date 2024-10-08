<?php 

class Database{
    // DB connection parameters
    private $host = "localhost";
    private $user = "root";
    private $pass = "password";
    private $dbname = "php_crud";
    public $pdo;

    // DB Connect
    public function __construct(){
        if(!isset($this->pdo)){ // Check if PDO instance is not already set
            try {
                // Create new PDO connection
                $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);

                // Set the PDO error mode to Exception
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                // Set UTF-8 encoding
                $this->pdo->exec("SET NAMES 'utf8'"); 

            } catch (PDOException $e) {
                // Handle connection errors
                die("Error in connection: " . $e->getMessage());
            }
        }
    }
}
