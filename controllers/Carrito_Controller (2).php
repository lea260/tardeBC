<?php

public function render();
{

}

public function ver()
{
    $modelo = new Articulos_Model();
    $Lst = $modelo->$Listar();
    $this->view->listar = $Lst;
    $this->view->render("carrito/ver");
}

?<