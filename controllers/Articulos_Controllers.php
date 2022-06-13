<?php

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
    public function listar($param = null)
    {

        //obtiene todos los articulos
        $articulos = $this->model->listar();
        //lo asigna a la varible articulos
        $this->view->articulos = $articulos;
        //lista los articulos
        $this->view->render('articulos/listar');
        $arr = [];
    }

    public function nuevo($param = null)
    {

        //obtiene todos los articulos
        //$articulos = $this->model->listar();
        //lo asigna a la varible articulos
        //$this->view->articulos = $articulos;
        //lista los articulos
        $this->view->render('articulos/nuevo');
        //$arr = [];
    }
    public function crear()
    {
        //obtengo los datos de la peticion http, post body
        $json = file_get_contents('php://input');
        //convierto en un array asociativo de php
        $obj = json_decode($json);

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
    }

} //end crear