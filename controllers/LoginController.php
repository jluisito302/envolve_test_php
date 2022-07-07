<?php
require_once './controllers/SessionController.php';
require_once './models/UsersModel.php';

class LoginController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = null;
        $this->view->users = null;
    }

    public function index(){
        $this->view->render('auth/login');
    }

    public function LoginVerify(){
        $session = new SessionController();
        if ($session->existsSession()) {
            header('Location: '.constant('URL').'home');
        }else{
            $this->view->render('auth/login');
        }
    }

    //METHOD FOR AUTHENTICATION USERS
    public function authLogin(){
        if(isset($_POST['email']) && isset($_POST['password'])){

            $data=['email'     => $_POST['email'], 
                    'password' => $_POST['password']
                ];
            
            //VALIDATE OF INPUTS TYPE
            $validation = $this->validateData($data);
            //VALIDATION NEXT
            if ($validation == 0) {
                $userModel = new UsersModel();

                if($userModel->validateCredentials($data)){
                    
                    $session = new SessionController();
                    $session->init($data['email']);

                    $usersModel = new UsersModel();
                    $allUsers = $usersModel->users();
                    
                    $this->view->users = $allUsers;
                    
                    header('Location: '.constant('URL').'home');
                }else{
                    header('Location: '.constant('URL').'');
                }
            }
        }
    }

    //FUNCTION OF LOGOUT USERS
    public function logout(){
        $session = new SessionController();
        $session->destroySession();
        header('Location: '.constant('URL').'');
    }

    //VALIDATIO THE DATA IS NO EMPTY SPACE INPUT
    protected function validateData($data)
    {
        $flag = 0;
        if (
            trim($data['email']) === "" || trim($data['password']) === "" 
        ) {
            $flag = 1;
        }
        return $flag;
    }


}

?>