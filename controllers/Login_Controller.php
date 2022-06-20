<?php
// require_once 'vendor/autoload.php';
// require_once 'auth/Auth.php';
require_once 'entidades/usuario.php';

class Login_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "";
        $this->view->resultadoLogin = "";
    }

    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->alumnos = "cargado";
        $this->view->render('login/index');
    }
    
    public function login(){
        $this->view->render('login/index');
    }
    public function signin(){
        $user = new Usuario();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
        $id = $this->model->signin($user);
        $_SESSION['id'] = serialize($id);
        

        
    }
    

    
}