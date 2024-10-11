<?php 
include_once 'lib/Session.php';
include_once 'lib/Database.php';
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
        $sql = "SELECT * FROM user_lr WHERE email = :email";
        $result = $this->db->pdo->prepare($sql);
        $result->bindValue(':email', $email);
        $result->execute();
        if($result->rowCount() > 0){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Email already exists</div>";
            return $msg;
        }
        
        //inserting data into database
        $sql = "INSERT INTO user_lr(name, username, email, password) VALUES(:name, :username, :email, :password)";
        $result = $this->db->pdo->prepare($sql);
        $result->bindValue(':name', $name);
        $result->bindValue(':username', $username);
        $result->bindValue(':email', $email);
        $result->bindValue(':password', $password);
        $result->execute();
        if($result){
            $msg = "<div class='alert alert-success alert-dismissible fade show mx-auto'>User registered successfully</div>";
            return $msg;
        }else{
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Something went wrong</div>";
            return $msg;
        }
       

    }


    public function getLoginUser($email, $password){
        $sql = "SELECT * FROM user_lr WHERE email = :email AND password = :password LIMIT 1";
        $result = $this->db->pdo->prepare($sql);
        $result->bindParam(':email', $email);
        $result->bindParam(':password', $password);
        $result->execute();
        $result = $result->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    //user login
    public function userLogin($data){
        $email = $data['email'];
        $password = md5($data['password']);

        //validate checking for empty fields
        if(empty($email) || empty($password)){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Field must not be empty</div>";
            return $msg;
        }

        //email validation
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Email is not valid</div>";
            return $msg;
        }

        // Check if email exists in the database
        $sql = "SELECT * FROM user_lr WHERE email = :email";
        $result = $this->db->pdo->prepare($sql);
        $result->bindValue(':email', $email);
        $result->execute();

        if ($result->rowCount() == 0) {
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Email not found</div>";
            return $msg;
        }


        $userData = $this->getLoginUser($email, $password);
        if($userData){
            Session::init();
            Session::set("login", true);
            Session::set("id", $userData->id);
            Session::set("name", $userData->name);
            Session::set("username", $userData->username);
            Session::set("email", $userData->email);
            Session::set("password", $userData->password);
            Session::set("loginmsg", "<div class='alert alert-success alert-dismissible fade show mx-auto'>Logged in successfully</div>");
            header("Location: index.php");
        }else{
            $msg = "<div class='alert alert-danger alert-dismissible fade show mx-auto'>Invalid email or password</div>";
            return $msg;
        }
    }

    // Fetch all users from the database
    public function getUserData(){
        $sql = "SELECT * FROM user_lr";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
        return $result;
    }

}

