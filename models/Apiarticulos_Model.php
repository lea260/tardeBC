<?php
require_once 'entidades/articulo.php';

class Apiarticulos_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function listar()
    {
        //Crea un array por php
        $items = [];
        try {
            $urlDefecto = constant('URL') . 'public/imagenes/articulos/imagenDefecto.svg'; //Define la url por defecto
            $query      = $this->db->connect()->query('SELECT id_productos, codigo,descripcion,precio,fecha FROM productos');
            while ($row = $query->fetch()) {
                $item              = new Articulo();
                $item->id          = $row['id_productos'];
                $item->codigo      = $row['codigo'];
                $item->descripcion = $row['descripcion'];
                $item->precio      = $row['precio'];
                $item->fecha       = $row['fecha'];
                if (isset($row['url'])) {
                    $item->url = $row['url'];
                } else {
                    $item->url = $urlDefecto;
                }
                array_push($items, $item);
            }
            return $items;
        } catch (PDOException $e) {
            return [];
        }
    }

    public function verArticulo($id)
    {
        $articulo = null;
        try {
            $query = $this->db->connect()->prepare('SELECT id_productos, codigo,descripcion,precio,fecha FROM productos WHERE id_productos=:id');
            $query->bindValue(':id', $id);
            $query->execute();
            while ($row = $query->fetch()) {
                $articulo              = new Articulo();
                $articulo->id          = $row['id_productos'];
                $articulo->codigo      = $row['codigo'];
                $articulo->descripcion = $row['descripcion'];
                $articulo->precio      = $row['precio'];
                $articulo->fecha       = $row['fecha'];
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $articulo;
    }
    public function actualizar($articulo)
    {

        $resultado = false;
        $pdo       = $this->db->connect();
        try {
            $query = $pdo->prepare('UPDATE productos SET codigo=:codigo, descripcion=:descripcion, precio= :precio, fecha= :fecha WHERE id_productos= :id');
            $query->bindParam(':codigo', $articulo->codigo);
            $query->bindParam(':descripcion', $articulo->descripcion);
            $query->bindParam(':precio', $articulo->precio);
            $query->bindParam(':fecha', $articulo->fecha);
            $query->bindParam(':id', $articulo->id);
            $resultado = $query->execute();
            $filasAf   = $query->rowCount();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    }

    public function crear($articulo)
    {

        $pdo = $this->db->connect();
        try {
            $query = $pdo->prepare('insert into productos
            (codigo, descripcion,precio, fecha)
            values (:codigo, :descripcion, :precio, :fecha)');
            $query->bindParam(':codigo', $articulo->codigo);
            $query->bindParam(':descripcion', $articulo->descripcion);
            $query->bindParam(':precio', $articulo->precio);
            $query->bindParam(':fecha', $articulo->fecha);
            $lastInsertId = 0;
            if ($query->execute()) {
                $lastInsertId = $pdo->lastInsertId();
            } else {
                $lastInsertId = -1;
            }
            return $lastInsertId;
        } catch (PDOException $e) {
            return -1;
        } finally {
            $pdo = null;
        }
    }

    public function eliminar($id)
    {

        $resultado = false;
        $pdo       = $this->db->connect();

        try {
            $query = $pdo->prepare('DELETE FROM productos WHERE id_productos= :id');
            $query->bindParam(':id', $id);
            $resultado = $query->execute();
            $filasAf   = $query->rowCount();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        } finally {
            $pdo = null;
        }
    }

}