<?php

namespace adso\Mascotas\libs;

class Core
{
    protected $controller = "MainController";
    protected $methods = "index";
    protected $params = [];

    public function __construct()
    {
        $url = $this -> getUrl();

        if($url !="" && file_exists("../app/controller/". ucwords($url[0])."Controller.php")){
            $this->controller = ucwords($url[0])."Controller";
            unset($url[0]);
        }

        $obj = "adso\\Mascotas\\controller\\". $this -> controller;
        $this -> controller = new $obj;

        if(isset($url[1])){
            if(method_exists($this -> controller, ucwords($url[1]))){
                $this -> methods = ucwords($url[1]);
                unset($url[1]);
            }
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this -> methods], $this->params);
    }

    public function getUrl(){

        if(isset($_GET["url"])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }

}