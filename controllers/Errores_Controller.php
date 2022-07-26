<?php

class Errores_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Hubo un error al cargar los recursos mostro";
        $this->view->render('errores/index');
    }
}