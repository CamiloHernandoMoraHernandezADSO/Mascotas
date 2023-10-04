<?php

namespace adso\Mascotas\controller;

use adso\Mascotas\libs\Controller;

class MainController extends Controller {

    public function __construct()
    {
        
    }

    function index(){
        $data = [
            "titulo"    => "Home",
            "subtitulo" => "Saludo del sistema"
        ];
        $this -> view("home", $data);
    }
}