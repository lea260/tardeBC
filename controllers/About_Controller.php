<?php
class About_Controller extends Controller{
    public function __construct()
    {
        parent::__construct();

    }
    public function render()
    {
        $this->view->render('about/index');
    }
}

























?>