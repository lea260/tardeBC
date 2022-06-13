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
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $obj                   = json_decode($json);
        $articulo              = new Articulo();
        $articulo->codigo      = $obj->codigo;
        $articulo->descripcion = $obj->descripcion;
        $articulo->precio      = $obj->precio;
        $articulo->fecha       = $obj->fecha;
        //array_push($listaArticulos, $articulo);
        //$items[] = $item;

        $resultado = $this->model->crear($articulo);
        //$articulo->id = $obj->id;
        //$articulo->nombre = $obj->nombre;
        //$articulos = $this->model->get();
        //$this->view->articulos = json_encode($articulos);
        //$listaObjetos = json_encode($listaArticulos);

        $respuesta = [
            "ArituloId" => $resultado,
        ];
        $this->view->respuesta = json_encode($respuesta);

        $this->view->render('api260260/articulos/crearm');
        //var_dump($this);
        //var_dump($this->view);
    } //end crear

}