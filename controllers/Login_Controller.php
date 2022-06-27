<?php
// require_once 'vendor/autoload.php';
// require_once 'auth/Auth.php';
require_once 'entidades/usuario.php';

class Login_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }
    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->alumnos = "cargado";
        $this->view->render('login/index');
    }

    public function login()
    {
        $this->view->render('login/index');
    }
    public function signin()
    {
        $user           = new Usuario();
        $user->email    = $_POST['email'];
        $user->password = $_POST['password'];
        $id             = $this->model->signin($user);
        $_SESSION['id'] = serialize($id);
    }
    public function test()
    {
        $pass             = "1234567890";
        $hash             = password_hash($pass, PASSWORD_BCRYPT, ['cost' => 10]);
        $ret              = password_verify($pass, $hash);
        $this->view->hash = "Hash es: " . $hash;
        $this->view->ret  = "devolucion es: " . $ret;
        $this->view->render('login/test');

    }
<<<<<<< HEAD

=======
>>>>>>> 3d94d65 (agregue contenido a login_controller.php y a articulos02_model.php)
}