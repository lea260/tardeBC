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
    public function listar()
    {
        //$alumnos = $this->model->get();
        $this->view->mensaje = "cargado";
        $this->view->render('articulos/listar');
    }

}