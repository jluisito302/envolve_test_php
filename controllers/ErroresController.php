<?php

class Errores extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Page not found";
        $this->view->render('404');
    }

}

?>