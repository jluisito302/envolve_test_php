<?php 
require_once './models/UsersModel.php';

class SessionController extends Controller{

    function __construct()
    {
        session_start();
    }

    //INITIAL SESSION
    public function init($email){
        $_SESSION["user"] = $email;
    }

    //VALIDATE IF EXISTS SESSION 
    public function existsSession(){
        if(isset($_SESSION["user"])) return true;
        return false;
    }

    public function destroySession(){
        unset($_SESSION["usuario"]);
        session_unset();
        session_destroy();
    }



}




?>