<?php

class Pdf_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
      $this->view->render('pdf/index');
    }

    public function generar()
    {
      $this->view->render('pdf/generar');
    }

    public function generarPdf02()
    {
      $this->view->render('pdf/generarPdf02');
    }

}