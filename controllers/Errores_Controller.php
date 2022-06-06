<?php

class Errores_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "No existe eso mostro";
        $this->view->render('errores/index');
        //echo "Error al cargar el recurso";
    }
}