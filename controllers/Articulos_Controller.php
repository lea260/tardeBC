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
        $json = file_get_contents('php://input');
        $obj = json_decode($json);

        $articulo = new Articulo();
        $articulo->codigo = $obj->codigo;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio = $obj->precio;
        $articulo->fecha = $obj->fecha;

        $resultado = $this->model->crear($articulo);

        $respuesta = [
            "ArituloId" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api260260/articulos/crearm');

    } //end crear

}

;