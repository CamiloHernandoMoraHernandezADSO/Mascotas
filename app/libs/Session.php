<?php

namespace adso\Mascotas\libs;

class Session 
{
    private $login = false;

    private $user;

    function __construct()
    {
        session_start();
        if(isset($_SESSION['user'])){
            $this -> user = $_SESSION['user'];
            $this -> login = true;
        }else{
            unset($this -> user);
            $this -> login = false;
        }
    }

    function loginStar($user)
    {
        if($user){
            $this -> user = $_SESSION['user'] = $user ;
            $this -> login = true;
        }
    }

    function loginDestroy(){
        unset($_SESSION['user']);
        unset($this -> user);
        $this -> login = false;
        session_destroy();
    }

    function getLogin()
    {
        return $this -> login;
    }

    function getUser()
    {
        return $this -> user;
    }

}