<?php 

class Session {

    private $sessionName = 'user';

    function __construct()
    {
        
    }

    //METHOD FOR RENAME AT USER SESSION
    public function setCurrenUser($user){
        $_SESSION[$this->sessionName] = $user;
    }

    //METHOD GET AT USER SESSION
    public function getCurrentUser(){
        return $_SESSION[$this->sessionName];
    }

    //SESSION DESTROY
    public function closeSession(){
        session_unset();
        session_destroy();
    }

    //METHOD FOR EXIST SESSION
    public function existsSession(){
        return isset($_SESSION[$this->sessionName]);
    }

}




?>