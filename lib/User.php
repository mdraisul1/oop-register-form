<?php 
include_once 'lib/Database.php';
include_once 'lib/Session.php';
class User{

    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    //User Register
    public function userRegister($data){
        $name       = $data['name'];
        $username   = $data['username'];
        $email      = $data['email'];
        $password   = md5($data['password']);

        //validate checking for empty fields
        if(empty($name) || empty($username) || empty($email) || empty($password)){
            echo "<div class='alert alert-danger alert-dismissible fade show w-50 mx-auto'>Field must not be empty</div>";
        }
    }
}

