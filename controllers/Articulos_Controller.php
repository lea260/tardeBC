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
        $this->view->render('artriculos/index');
    }

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
    public function nuevo(){
        $this->view->render('articulos/nuevo');
    }

    
    public function crear(){
        

        $articulo = new Articulo();
        $articulo->codigo = $_POST['codigo'];
        $articulo->descripcion = $_POST['descripcion'];
        $articulo->precio = $_POST['precio'];
        $articulo->fecha = $_POST['fecha'];
        $resultado = $this->model->crear($articulo);

        $this->view->resultado = $resultado;

        $this->view->render('articulos/crear');

    } //end crear

}

;