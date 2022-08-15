<?php

class Articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }
    public function nuevo()
    {
        $this->view->render("articulos/nuevo");
    }
    //base+login
    public function render()
    {
        //$alumnos = $this->model->get();
        $this->view->mensaje = "cargado";
        $this->view->render('Articulos/Listar');
    }
    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->listar();
        //lo asigna a la varible articulos
        $this->view->listar = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
        $arr = [];
    }

    public function ingresar()
    {
        $nombre     = $_POST['nombre'];
        $pass       = $_POST['pass'];
        $exitoLogin = $this->model->ingresar($nombre, $pass);
        if ($exitoLogin) {
            $token = Auth::SignIn([
                'id' => 1,
                'name' => $nombre,
                'role' => 'cliente',
            ]);
            $this->view->token        = $token;
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"]       = $nombre;
            $_SESSION["rol"]          = "cliente";
            $this->view->render('login/ingresar');
        } else {
            $this->view->resultadoLogin = "usuario o contraseña incorrectos";
            $this->view->render('login/index');
        }

    }
    public function salir()
    {
        //$_SESSION["estalogueado"] = false;
        unset($_SESSION["estalogueado"]);
        unset($_SESSION["nombre"]);
        session_destroy();
        $this->view->render('index/index');

    }
}