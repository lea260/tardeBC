<?php
require_once 'models/Articulos_Model.php';
class Carrito_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }
    
    public function render()
    {

    }

    public function ver()
    {

        $this->view->render("carrito/ver");
    }

}