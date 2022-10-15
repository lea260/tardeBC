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
            $token          = Jwts::GenerarTk($data);
            $_SESSION['tk'] = $token;
            echo $token;
        } catch (Exception $th) {
            //throw $th;
        }
    }

    public function test()
    {
        try {
            //code...
            $tk = Jwts::value($_SESSION['tk']);
            print_r($tk);
        } catch (Exception $th) {
            //throw $th;
        }
        //$tk = eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYmYiOjE2NjU4NTUwMzAsImlhdCI6MTY2NTg1MzIzMCwiZXhwIjoxNjY1ODU1MDMwLCJkYXRhIjp7InVzdWFyaW9faWQiOjUsInJvbCI6ImFkbWluIn0sImlpcyI6ImxvY2FsaG9zdCJ9.E9n6NlytAfRsJiZI8RUSVNZZNSb8Q0uksxmhI7aJuWM

    }

}