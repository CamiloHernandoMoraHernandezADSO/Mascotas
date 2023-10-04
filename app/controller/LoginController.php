<?php

namespace adso\Mascotas\controller;

use adso\Mascotas\libs\Controller;
use adso\Mascotas\libs\Email;
use adso\Mascotas\libs\Helper;
use adso\Mascotas\libs\Session;


class LoginController extends Controller
{

    protected $model;

    public function __construct()
    {
        $this -> model = $this -> model("User");
        
    }

    public function index(){
        $data = [
            "titulo" => "login",
            "subtitulo" => "preparate a loguearte"
        ];

        $this -> view("login", $data);
    }

    public function validate(){
        
        if($_SERVER['REQUEST_METHOD'] == "POST"){

            $errors = array();

            $correo = $_POST['email'];
            $passwor = $_POST['clave'];

            if($correo == ""){
                $errors["name_error"] = "el correo es requerido";
            }
            if($passwor == ""){
                $errors["clave_error"] = "la contraseña es requerido";
            }
            if(strlen($correo) > 50){
                $errors["name_error"] = "el correo excede el limite de caracteres";
            }
            if(strlen($passwor) > 50){
                $errors["clave_error"] = "la contraseña excede el limite de caracteres";
            }

            if(empty($errors)){

                $data = $this -> model -> validate($correo, $passwor);

                if(empty($data)){
                    $errors["clave_error"] = "usuario o contraseña incorrecto";

                    $data = [
                        "titulo" => "login",
                        "subtitulo" => "preparate a loguearte",
                        "errors" => $errors
                    ];
                    
                    $this -> view("login", $data);
                }else{

                    $session = new Session();

                    $session -> loginStar($data);

                    header("Location:".URL."/admin");
                }

            }else{
                $data = [
                    "titulo" => "login",
                    "subtitulo" => "preparate a loguearte",
                    "errors" => $errors
                ];
                $this -> view("login", $data);
            }
        }else{
            header("Location:".URL."/login");
        }
    }

    public function forget(){
        $data = [
            "titulo" => "Olvido contraseña",
            "subtitulo" => "Recupere la contraseña"
        ];

        $this -> view("forget", $data);
    }

    function sendEmail()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errorres = array();
            $email    = $_POST['email'] ?? '';
            if ($email == "") {
                $errorres['email_empty'] =  "El correo es requerido";
            }
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorres['email_error'] =  "El correo no es valido";
            }
            if (empty($errorres)) {

                $data = $this->model->validateEmail($email);

                if (!empty($data)) {
                    $email = $data['email'];
                    
                    $id = Helper::encrypt($data['id']);                                      
                    //$id = $data['id'];
                    print_r($id);
                    $correo = new Email();
                    $correo->sendEmail($email, $id);
                    header("Location:".URL."/login");
                } else {
                    $errorres['email_dontexist'] =  "El correo no existe";
                    $data = [
                        "titulo" => "Recuperar contraseña",
                        "subtitulo" => "Formulario recuperar contraseña",
                        "errors" => $errorres
                    ];
                    $this->view('forget', $data);
                }
            } else {
                $data = [
                    "titulo" => "Recuperar contraseña",
                    "subtitulo" => "Formulario recuperar contraseña",
                    "errors" => $errorres
                ];

                $this->view('forget', $data);
            }
        } else {
            die("!Te pille, ingreso no permitido¡");
        }
    }

    function updatepassword($id = "")
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errorres = array();
            $id = $_POST['id'] ?? '';
            print_r($id);
            print_r('<br>');
            $id = Helper::decrypt($id);   
            print_r($id);         
            $password           = $_POST['password'] ?? '';
            $confirm_password   = $_POST['confirm_password'] ??  '';
            //Validamos
            if ($password == "") {
                $errorres['password_error'] =  "La contraseña es requerida";
            }
            if ($confirm_password == "") {
                $errorres['confirm_password'] =  "La confirmación de la contraseña es requerida";
            }
            if ($password  != $confirm_password) {
                $errorres['password_error'] =  "La confirmación no coindice con su contraseña";
            }

            if (!empty($errorres)) {
                $data = [
                    "titulo" => "Modificar contraseña",
                    "subtitulo" => "Formulario modificar contraseña",
                    "errors" => $errorres,
                    "data" => $id
                ];
                $this->view('update', $data);
            } else {
                //Modificamos la contraseña
                if ($this->model->updatePassword($id, $password)) {
                    print_r($password);
                    echo "Contraseña modificada";
                    header("Location:".URL."/login");
                }
            }
        } else {
            $data = [
                "titulo" => "Modificar contraseña",
                "subtitulo" => "Formulario modificar contraseña",
                "errors" => [],
                "data" => $id
            ];
            $this->view('update', $data);
        }
    }

}