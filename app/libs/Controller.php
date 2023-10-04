<?php

namespace adso\Mascotas\libs;

class Controller{

    public function __construct(){

    }

    public function model($model = ""){
        $model = "adso\Mascotas\model\\". ucwords($model)  ."Model";
        return new $model();
    }

    public function view($view = "", $data = []){
        ob_start();
        $view = $view . '.view';
        if (file_exists("../app/views/" . $view . ".php")) {
            require_once("../app/views/" . $view . ".php");
            $contend = ob_get_clean();
            require_once('../app/views/layout/app.layout.php');
        } else {
            die("La vista " . $view . "no existe");
        }
    }
}