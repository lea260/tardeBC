<?php
require_once 'entidades/articulo.php';
require_once 'vendor/autoload.php';

class Api260260articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    public function listar()
    {

        try {
            $mensaje   = "hola desde la api";
            $respuesta = [
                "datos" => "error al cargararse",
                "totalResultados" => 0,
                "mensaje" => $mensaje,
            ];
            $this->view->respuesta = json_encode($respuesta);
        } catch (\Throwable $th) {
            //throw $th;
            $respuesta = [
                "datos" => "error al ingresar",
                "totalResultados" => 0,
                "token" => $token,
            ];
            $this->view->respuesta = json_encode($respuesta);
        }

        $this->view->render('api260260/articulos/listar');
    }
}