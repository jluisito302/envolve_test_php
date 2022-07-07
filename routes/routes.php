<?php

require_once './controllers/ErroresController.php';

class Router{

    function __construct()
    {
        $controller = 'LoginController';
        $method = 'LoginVerify';

        if(isset($_GET['url'])){
            $url = $_GET['url'];
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            if (isset($url[0]) && isset($url[1])) {
                $controller = ucwords($url[0]).'Controller';
                $method=$url[1];
            }else{
                $controller = ucwords($url[0]).'Controller';
                $method='index';
            }
        }

        //IF THE FILE EXIST 
        if (file_exists('./controllers/'.$controller.'.php')) {
            require_once './controllers/'.$controller.'.php';
            //OBJECT CONTROLLER
            $objectController = new $controller();
            //ACCEDER METHOD
            $objectController->$method();
        }else{
            $controller = new Errores();
        }
        
        
        
    }
}
    
?>