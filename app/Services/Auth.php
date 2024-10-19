<?php

namespace App\Services;

class Auth {
    public function login(string $email, string $password, bool $remember = false){
        echo md5($password);
        echo "<br>";
        echo md5($password);
        die;
    }

    public function user(){

    }

    public function id(){

    }

    public function logout(){

    }
    
}