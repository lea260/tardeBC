<?php

class Articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }

    public function render()
    {
        $this->view->mensaje = "cargado";
        $this->view->render('articulos/index');

    }

    //base+login

    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->listar();
        //lo asigna a la varible articulos
        $this->view->lista = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
        $arr = [];
    }

    public function nuevo($param = null)
    {

        //obtiene todos los articulos
        //$articulos = $this->model->listar();
        //lo asigna a la varible articulos
        //$this->view->lista = $articulos;
        //lista los articulos
        $this->view->render('articulos/nuevo');
        //$arr = [];
    }

    public function crear()
    {

        $codigo      = $_POST['codigo'];
        $descripcion = $_POST['descripcion'];
        $precio      = $_POST['precio'];
        $fecha       = $_POST['fecha'];
        $img         = $_FILES['img'];
        $archivo     = $img['tmp_name'];
        $nombre      = $img['name'];
        $arr         = explode(".", $nombre);
        $ext         = $arr[count($arr) - 1];
        $id          = $this->model->crear($articulo);

        $ruta = "public/imagenes/articulos" . $id . "." . $ext;
        move_uploaded_file($archivo, $ruta);

        $articulo              = new Articulo();
        $articulo->codigo      = $codigo;
        $articulo->descripcion = $descripcion;
        $articulo->precio      = $precio;
        $articulo->fecha       = $fecha;

        $this->view->$id = $id;

        $this->view->render('articulos/crear');

    } //end crear
}