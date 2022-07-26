<?php

class Articulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje= "";
        $this->view->resultadoLogin = "";
    }


    public function render()
    {
        $this->view->mensaje = "Cargado";
        $this->view->render('articulos/index');
    }

    public function nuevo($param = null)
    {

        //Lista los articulos
        $this->view->render('articulos/nuevo');

    }
    public function listar($param = null)
    {

        //Obtiene todos los artículos
        $articulos = $this->model->listar();
        //Asigna a los mismos a una variable articulos
        $this->view->listar = $articulos;
        //Lista los artículos
        $this->view->render('articulos/listar');
    }

    public function crear()
    {
        $codigo= $_POST['codigo'];
        $descripcion= $_POST['descripcion'];
        $precio= $_POST['precio'];
        $fecha= $_POST['fecha'];
        $articulo= new Articulo();
        $articulo->codigo= $codigo;
        $articulo->descripcion= $descripcion;
        $articulo->precio= $precio;
        $articulo->fecha= $fecha;

        $id= $this->model->crear($articulo);
        $this->view->resultado = $id;
        $pathImg= $_FILES['img']['tmp_name'];
        $tmpName= $_FILES['img']['name'];
        $array= explode(".", $tmpName);
        $ext= $array[count($array) - 1];
        $ruta= 'public/imagenes/articulos/' . $id . "." . $ext;
        move_uploaded_file($pathImg, $ruta);

        $this->view->render('articulos/crear');

    }

    public function actualizar()
    {

        $id                    = $_POST['idaux'];
        $codigo                = $_POST['codigo'];
        $descripcion           = $_POST['descripcion'];
        $precio                = $_POST['precio'];
        $fecha                 = $_POST['fecha'];
        $articulo              = new Articulo();
        $articulo->id          = $id;
        $articulo->codigo      = $codigo;
        $articulo->descripcion = $descripcion;
        $articulo->precio      = $precio;
        $articulo->fecha       = $fecha;

        $resultado             = $this->model->actualizar($articulo);
        $this->view->resultado = $articulo->id;

        $this->view->render('articulos/actualizar');

    }

    public function verArticulo($param = null)
    {
        $idArticulo = $param[0];
        $articulo   = $this->model->verArticulo($idArticulo);

        $_SESSION["id_articulo"] = $idArticulo;

        $this->view->articulo = $articulo;

        $this->view->render('articulos/verArticulo');
    }

    public function eliminar($param = null)
    {
        $id = $_POST['idaux'];

        if ($this->model->eliminar($id)) {
            $mensaje = "Articulo eliminado correctamente, puede seguir con el uso de la aplicación";
        } else {
            $mensaje = "No se pudo eliminar el artículo, intente nuevamente.";
        }
        echo $mensaje;
    }

}