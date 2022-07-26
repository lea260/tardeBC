<?php
class Controller
{
    public $model;
    public $view;

    public function __construct()
    {
        $this->view = new View();
        session_start();
    }

    public function loadModel($model) //Si existe el modelo, lo carga
    {
        $url = 'models/' . ucfirst($model) . '_Model.php';
        if (file_exists($url)) {
            require $url;

            $modelName   = ucfirst($model) . '_Model';
            $this->model = new $modelName();
        }
    }
}