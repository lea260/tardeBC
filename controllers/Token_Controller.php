<?php
require_once "jwt/jwts.php";

class Token_Controller  extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localahost/prophp3bj/proyectoPHPComun/Api260260articulos

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

    public function generar()
    {
try {
    $data= ["usuario_id"=>5,
    "rol"=>"admin"];
    $token = jwts::generarTK($data);
    echo  $token;

}catch (exception $th) {
    //throw $th;
}
    } 
}