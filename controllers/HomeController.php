<?php
require_once './controllers/SessionController.php';
require_once './models/UsersModel.php';

class HomeController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->users=null;
    }

    public function index(){
        $session = new SessionController();
        if ($session->existsSession()) {
            $usersModel = new UsersModel();

            $allUsers = $usersModel->users(); 
            $this->view->users = $allUsers;
            $this->view->render('home');
        }else{
            header('Location: '.constant('URL').'login');
        }
        
    }
    //METHOD FOR SEARCH COLORS
    public function colors(){
        $usersModel = new UsersModel();

        $colors = $usersModel->colorsCount(); 
        echo json_encode($colors);
    }
}


?>
