<?php

class Apiarticulos_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localahost/prophp3bj/proyectoPHPComun/Api260260articulos
    public function render()
    {
    }

    public function listar()
    {
        $mensaje   = "hola desde la api";
        $lista     = $this->model->listar();
        $respuesta = [
            "datos" => $lista,
            "totalResultados" => count($lista),
            "mensaje" => $mensaje,
        ];
        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("apiarticulos/listar");
    }
    public function crear()
    {
        $datos = json_decode(file_get_contents('php://input'));
        $articulo              = new Articulo();
        $articulo->codigo      = $datos->codigo;
        $articulo->descripcion = $datos->descripcion;
        $articulo->precio      = $datos->precio;
        $articulo->fecha       = $datos->fecha;
        //$articulo->url = "lala"
        // $img                   = $_FILES['img']['tmp_name'];
        // $imgArray              = explode(".", $_FILES['img']['name']);
        // $ext                   = $imgArray[count($imgArray) - 1];
        // $resultado             = $this->model->crear($articulo);
        // $path                  = 'public/img/articulos/' . $resultado . "." . $ext;
        // if (in_array($ext, ['jpg', 'png', 'jpeg', 'gif'])) {
        //     move_uploaded_file($img, $path);
        // }
        $resultado = $this->model->crear($articulo);

        $respuesta = [
            "ArticuloID" => $resultado];

        $this->view->respuesta = json_encode($respuesta);
        $this->view->render("apiarticulos/crear");

    }

}