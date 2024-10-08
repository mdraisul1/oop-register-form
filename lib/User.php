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
           $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Field must not be empty</div>";
           return $msg;
        }

        //checking form username validation
        if(strlen($username) < 4){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Username must be at least 4 characters</div>";
            return $msg;
        }elseif(preg_match('/[!@#$%^&*()_+]/', substr($username, 0, 1))){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Username must not start with special character</div>";
            return $msg;
        }

        //email validation
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Email is not valid</div>";
            return $msg;
        }

        //checking for duplicate email
        $sql = "SELECT * FROM system WHERE email = '$email'";
        $result = $this->db->select($sql);
        if($result != false){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Email already exists</div>";
            return $msg;
        }
        
    }
}

