<?php


class Articulos_Controller extends Controller
{
    public function __construct ()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }

    public function render()  {
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
        $arr = array();
    }
       }