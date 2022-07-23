<?php

class Apiarticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localahost/prophp3bj/proyectoPHPComun/Api260260articulos

    public function listar()
    {

        $mensaje   = "hola desde la api";
        $respuesta = [
            "datos" => "error al ingresar",
            "totalResultados" => 0,
            "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("apiarticulos/listar");

    }

}