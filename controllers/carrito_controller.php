<?php
require_once "models/Articulos_Model.php";
class Carrito_Controller extends Controller
{

    public function ver()
    {
        /*$mensaje   = "hola desde la api";
        $lista     = $this->model->listar();
        $respuesta = [
        "lista" => $lista,
        "totalResultados" => count($lista),
        "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);*/

        $this->view->render("carrito/ver");
    }
}