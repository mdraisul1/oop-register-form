<?php 

class Session{
    
    public static function init(){
        if(session_id() == ''){
            session_start();
        }else{
            session_id();
        }
    }

    public static function set($key, $val){
        $_SESSION[$key] = $val;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    //destroy the session
    public static function destroy(){
        session_destroy();
        session_unset();
        header('Location: login.php');
    }

}