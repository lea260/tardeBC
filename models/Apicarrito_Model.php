<?php
require_once 'entidades/articulos.php';
require_once 'entidades/carrito.php';

class Apicarrito_Model extends Model
{
    public function __construct()
    {
        parent::__construct();

    }

    //localhost/prophp3bj/proyectoPHPComun/Apicarrito/completarcarrito
    public function completarCarrito($lista, $usuario)
    {
        //INSERT INTO `pedido` (`id`, `usuario_id`, `fecha`) VALUES (NULL, '1', '2021-09-23 16:27:40');
        //INSERT INTO `pedido` (`usuario_id`, `fecha`) VALUES ('1', '2021-09-02 16:01:29');

        //INSERT INTO `item` ( `articulo_id`, `cantidad`, `precio`, `pedido_id`) VALUES ('2', '5', '25', '6');
        $pdo = $this->db->connect();
        $pdo->beginTransaction();
        //'2021-09-23 16:27:40')
        try {
            $fecha = date('Y-m-d H:i:s', time());
            $query = $pdo->prepare('insert into pedido (usuario_id, fecha) VALUES (:idUsuario, :fecha)');
            $query->bindParam(':idUsuario', $usuario);
            $query->bindParam(':fecha', $fecha);
            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertId = $pdo->lastInsertId();
            } else {
                //Pueden haber errores, como clave duplicada
                $lastInsertId = -1;
                //echo $consulta->errorInfo()[2];
            }
            $query = $pdo->prepare('insert into item ( articulo_id, cantidad, precio, pedido_id) VALUES (:articulo_id, :cantidad, :precio, :pedido_id)');
            foreach ($lista as $key => $articulo) {
                # code...
                $query->bindParam(':articulo_id', $articulo->id);
                $query->bindParam(':cantidad', $articulo->cantidad);
                $query->bindParam(':precio', $articulo->precio);
                $query->bindParam(':pedido_id', $lastInsertId);
                $query->execute();
            }
            //:descripcion, :precio, :fecha
            //$query->close();
            $pdo->commit();
            return $lastInsertId;
        } catch (PDOException $e) {
            $pdo->rollBack();
            return false;
        } finally {
            $pdo = null;
        }
    }

    public function get_nginx_headers($function_name = 'getallheaders')
    {

        $all_headers = [];

        if (function_exists($function_name)) {

            $all_headers = $function_name();
        } else {

            foreach ($_SERVER as $name => $value) {

                if (substr($name, 0, 5) == 'HTTP_') {

                    $name = substr($name, 5);
                    $name = str_replace('_', ' ', $name);
                    $name = strtolower($name);
                    $name = ucwords($name);
                    $name = str_replace(' ', '-', $name);

                    $all_headers[$name] = $value;
                } elseif ($function_name == 'apache_request_headers') {

                    $all_headers[$name] = $value;
                }
            }
        }

        return $all_headers;
    }

}