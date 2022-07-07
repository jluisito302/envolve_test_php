<?php
require_once './models/UsersModel.php';

class RegisterController extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
    }

    public function index(){
        $this->view->render('auth/register');
    }

    //METHOD FOR REGISTER NEW USER
    public function registerUser(){
        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['color'])){

            $data=['email'     => $_POST['email'], 
                    'password' => $_POST['password'],
                    'color'    => $_POST['color']];
            
            //VALIDATE OF INPUTS TYPE
            $validation = $this->validateData($data);
            //VALIDATION NEXT
            if ($validation == 0) {
                $userModel = new UsersModel();
                $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
                if($userModel->insert($data)){
                    //REDIRECT TO LOGIN
                    $this->view->mensaje = "Tu cuenta ha sido creada exitosamente ... ";
                    return $this->view->render('messages/welcome');
                }else{
                    $menssage = "Email duplicado";
                }
            }else{
                $menssage = "Los campos son requeridos";
            }
            $this->view->mensaje = $menssage;
            header('Location: '.constant('URL').'register');
        }
        
    }

    //VALIDATIO THE DATA IS NO EMPTY SPACE INPUT
    protected function validateData($data)
    {
        $flag = 0;
        if (
            trim($data['email']) === "" || trim($data['password']) === "" || trim($data['color']) === "" 
        ) {
            $flag = 1;
        }
        return $flag;
    }

}

?>