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
        $this->view->alumnos = "cargado";
        $this->view->render('login/index');
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

    public function nuevo($param = null)
    {

        //obtiene todos los articulos
        //$articulos = $this->model->listar();
        //lo asigna a la varible articulos
        //$this->view->listar = $articulos;
        //lista los articulos
        $this->view->render('articulos/nuevo');
        // $arr = [];
    }

}