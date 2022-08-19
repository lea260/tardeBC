<?php
#require_once 'vendor/autoload.php';
#require_once 'auth/Auth.php';

class Login_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }

    //base+login
    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->alumnos = "cargado";
        $this->view->render('login/index');
    }

    public function ingresar()
    {
        $nombre     = $_POST['nombre'];
        $password   = $_POST['password'];
        $exitoLogin = $this->model->ingresar($nombre, $password);
    }
    public function test()
    {
        //$_SESSION["estalogueado"] = false;
        unset($_SESSION["estalogueado"]);
        unset($_SESSION["nombre"]);
        session_destroy();
        $this->view->render('login/test');

    }
    public function login()
    {
         $pwd='1234';
         $hash = password_hash($pwd,PASSWORD_BCRYPT,['cost'=>10,]);
         $this->view->hash=$hash;
         $result= password_verify($pwd,$hash);
         $this->view->result=$result;
         
         $this->view->render('login/test');
        

    }
 
        
    } 