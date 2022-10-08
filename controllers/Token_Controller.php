<?php
require_once 'jwt/jwts.php';

class Token_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();

    }

    //localahost/prophp3bj/proyectoPHPComun/Api260260articulos
    public function render()
    {

    }

    public function generar()
    {
        try {
            //code..
            $data = ["usuario_id" => 5,
                "rol" => "admin"];
            $token = Jwts::GenerarTk($data);
            echo $token;
        } catch (Exception $th) {
            //throw $th;
        }
    }

    public function test()
    {
        echo "hola";

    }

}