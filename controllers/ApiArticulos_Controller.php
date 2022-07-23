<?php

class ApiArticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function render()
    {

    }

    public function listar()
    {
        $mensaje   = "Hola desde la Api";
        $respuesta = [
            "datos" => "error al ingresar",
            "totalResultados" => 0,
            "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("ApiArticulos/listar");
    }

}