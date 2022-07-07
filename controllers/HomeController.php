<?php

require './models/UsersModel.php';

class HomeController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->users=null;
    }

    public function index(){
        $usersModel = new UsersModel();

        $allUsers = $usersModel->users(); 
        $this->view->users = $allUsers;
        $this->view->render('home');
    }
    //METHOD FOR SEARCH COLORS
    public function colors(){
        $usersModel = new UsersModel();

        $colors = $usersModel->colorsCount(); 
        echo json_encode($colors);
    }
}


?>