<?php
require_once 'entidades/carrito.php';
require_once 'vendor/autoload.php';
require_once 'auth/Auth.php';

class Apicarrito_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localhost/prophp3bj/proyectoPHPComun/Apicarrito/completarcarrito
    public function completarCarrito()
    {
        try {

            //$tokenAux = @$headers['Authorization'];

            $json = file_get_contents('php://input');
            //convierto en un array asociativo de php
            $datos          = json_decode($json);
            $listaArticulos = $datos->lista;
            $usuario        = $datos->usuario;
            //$lista = array();
            $lista = [];
            foreach ($listaArticulos as $key => $obj) {
                $articulo           = new Carrito();
                $articulo->id       = $obj->id;
                $articulo->cantidad = $obj->cantidad;
                $articulo->precio   = $obj->precio;
                $lista[]            = $articulo;
                //array_push($lista, $articulo);
            }
            $resultado = $this->model->completarCarrito($lista, $usuario);

            $respuesta = [
                "datos" => $lista,
                "totalResultados" => count($lista),
                "usuario" => $usuario,
                "resultado" => $resultado
                
            ];
            $this->view->respuesta = json_encode($respuesta);
            if ($resultado == false) {
                http_response_code(400);
                $this->view->respuesta = json_encode([
                    "resultado" => $resultado,
                    "respuesta" => "error al completar el pedido",
                ]);
            } else {
                http_response_code(200);
            }
            $this->view->render('api/carrito/completarcarrito');
            //code...

        } catch (Exception $e) {
            echo "<h1>" . $e->getMessage() . "</h1>";
            echo $headers;
            http_response_code(401);
        }
    }

}