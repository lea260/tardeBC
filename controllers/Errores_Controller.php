<?php

class Errores_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "hay un error al cargr el recurso";
        $this->view->render('errores/index');
        //echo "error al cargar el recurso";
    }
}