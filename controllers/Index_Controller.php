<?php

class Index_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('index/index');
    }

    public function saludo()
    {
        echo "<p>Porque rayos abría que saludar a alguien.<p>";
        echo "<p>Acá solo saludamos a los verdaderos hombres.<p>";
        echo "<p>Y vos no sos uno, así que rajá de acá.<p>";
    }
}