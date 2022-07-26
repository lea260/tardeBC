<?php

require_once 'controllers/Errores_Controller.php';

class App
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null; //Crea una variable url en el que se le va a pasar el url de los controladores
        $url = rtrim($url, '/'); 
        $url = explode('/', $url); //Elimina las barras (/) del url
        if (empty($url[0])) {
            $archivoController = 'controllers/Index_Controller.php';
            require $archivoController;
            $controller = new Index_Controller();
            $controller->loadModel('index');
            $controller->render();
            return false;
        } else {
            $archivoController = 'controllers/' . ucfirst($url[0]) . '_Controller.php';
        }

        if (file_exists($archivoController)) {
            require $archivoController;
            $controllerName = ucfirst($url[0]) . '_Controller';
            $controller = new $controllerName();
            $controller->loadModel($url[0]);
            $nparam = sizeof($url);
            if ($nparam > 1) {
                if ($nparam > 2) {
                    $param = [];
                    for ($i = 2; $i < $nparam; $i++) {
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                } else {
                    $controller->{$url[1]}();
                }
            } else {
                $controller->render();
            }
        } else {
            $controller = new Errores_Controller();
        }
    }
}