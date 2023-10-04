<?php

namespace adso\Mascotas\controller;

use adso\Mascotas\libs\Controller;
use adso\Mascotas\libs\Session;

class UserController extends Controller
{
    protected $model;
    function __construct()
    {
        $session = new Session();

        if($session -> getLogin()){

            if($session -> getUser()["rol_id"] == 2 ){

                $this ->model = $this -> model("pet");

            }else{

                header("Location:".URL."/Admin");
            }

        }else{
            header("Location:".URL."/login");
        }
    }

    function index(){

        $datos = $this -> model -> allSelectP();

        $data = [
            "titulo" => "usuario",
            "subtitulo" => "vista de usuario",
            "mascotas" => $datos
        ];

        $this -> view("user/indexPerro", $data);
    }
    
    function gato(){
        
        $datos = $this -> model -> allSelectG();
        
        $data = [
            "titulo" => "usuario",
            "subtitulo" => "vista de usuario",
            "mascotas" => $datos
        ];
        
        $this -> view("user/indexGato", $data);
    }

    function details($id)
    {
        $datos = $this -> model -> showSelect($id);

        $data = [
            "titulo" => "usuario",
            "subtitulo" => "vista de usuario",
            "mascotas" => $datos
        ];

        $this -> view("user/details", $data);
    }
}