<?php
require_once "models/Articulos_Model";
class carrito_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    public function listar()
    {
        $mensaje   = "hola desde la api";
        $lista     = $this->model->listar();
        $respuesta = [
            "lista" => $lista,
            "totalResultados" => count($lista),
            "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("apiarticulos/listar");
    }
}