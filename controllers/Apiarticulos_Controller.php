<?php

class Apiarticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localahost/prophp3bj/proyectoPHPComun/Api260260articulos
    public function render()
    {
    }

    public function listar()
    {
        $mensaje   = "hola desde la api";
        $lista = $this->model->listar();
        $respuesta = [
          "datos" => $lista,
          "totalResultados" => count($lista),
          "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("apiarticulos/listar");
    }

    

}