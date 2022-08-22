<?php
// require_once 'models\Articulos_Model.php';
require_once 'entidades/carrito.php';
class Carrito_Controller extends Controller{
    public function __construct()
    {
        parent::__construct();

    }
    public function render()
    {
    }

    public function ver()
    {
		// $modelo = new Articulos_Model();
		// $this->view->lista = $modelo->listar();
        $this->view->render("carrito/ver");
    }
    
    public function save(){
        try {

            $datos = json_decode(file_get_contents('php://input'));
            $listaArticulos = $datos->lista;
            $usuario = 1;
            $lista = [];
            foreach ($listaArticulos as $key => $obj) {
                $articulo = new Carrito();
                $articulo->id = $obj->id;
                $articulo->cantidad = $obj->cantidad;
                $articulo->precio = $obj->precio;
                $lista[] = $articulo;

        }
        $resultado = $this->model->Save($lista, $usuario);


        $respuesta = [
            "Mensage"=> "Carrito Actaulisado",
            "datos" => $lista,
            "totalResultados" => count($lista),
            "usuario" => $usuario,
            "PedidoID" => $resultado,
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
        $this->view->render('carrito/carritoEnd');
        //code...

    } catch (Exception $e) {
        echo "<h1>" . $e->getMessage() . "</h1>";
        echo $headers;
        http_response_code(401);
    }

        
    }
    
}