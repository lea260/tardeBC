<?php

class Articulos_Controller extends Controller
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
        $this->view->mensaje = "cargado";
        $this->view->render('articulos/index');
    }

    public function nuevo($param = null)
    {

        //lista los articulos
        $this->view->render('articulos/nuevo');

    } //end listar
    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->listar();
        //lo asigna a la varible articulos
        $this->view->listar = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
        $arr = [];
    } //end listar

    public function crear()
    {

        $codigo                = $_POST['codigo'];
        $descripcion           = $_POST['descripcion'];
        $precio                = $_POST['precio'];
        $fecha                 = $_POST['fecha'];
        $articulo              = new Articulo();
        $articulo->codigo      = $codigo;
        $articulo->descripcion = $descripcion;
        $articulo->precio      = $precio;
        $articulo->fecha       = $fecha;

        $resultado             = $this->model->crear($articulo);
        $this->view->resultado = $resultado;

        $this->view->render('articulos/crear');

    } //end crear

    public function verArticulo($param = null)
    {
        $idArticulo = $param[0];
        $articulo   = $this->model->verArticulo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;
        $this->view->render('articulos/verArticulo');
    }

}