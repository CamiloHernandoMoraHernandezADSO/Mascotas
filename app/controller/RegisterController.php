<?php

namespace adso\Mascotas\controller;

use adso\Mascotas\libs\Controller;
use adso\Mascotas\libs\Session;
use Error;

class RegisterController extends Controller
{

    protected $model;

    public function __construct()
    {
        $this -> model = $this -> model("User");
        
    }

    public function index(){
        $data = [
            "titulo" => "registro",
            "subtitulo" => "registrate"
        ];

        $this -> view("register", $data);
    }

    public function validate(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $error = array();

            $nombre = $_POST['name'];
            $correo = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password_confirmation'];

            if($nombre == ""){
                $error['name_error'] = "el nombre es requerido";
            }
            if($correo == ""){
                $error['mail_error'] = "el correo es requerido";
            }
            if($password == ""){
                $error['pass_error'] = "la contraseña es requerida";
            }
            if(strlen($nombre) > 50){
                $error['name_error'] = "el nombre excede el limite de caracteres";
            }
            if(strlen($correo) > 50){
                $error['mail_error'] = "el correo excede el limite de caracteres";
            }
            if(strlen($password) > 50){
                $error['pass_error'] = "la contraseña excede el limite de caracteres";
            }
            if($password != $password2){
                $error['confirm_error'] = "las contraseñas no coinciden";
            }

            if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
                $error['mail_error'] = "el correo no es valido";
            }

            if(empty($error)){
                
                $data = $this -> model -> insert($nombre, $correo, $password);
                
                if(empty($data)){
                    $data = [
                        "titulo" => "registro",
                        "subtitulo" => "registrate",
                        "errors" =>  $error
                    ];            
                    $this -> view("login", $data);

                }else{

                    $data = $this -> model -> validate($correo, $password);

                    $session = new Session();
                    $session -> loginStar($data);

                    header("Location:".URL."/admin");
                }

            }else{
                $data = [
                    "titulo" => "registro",
                    "subtitulo" => "registrate",
                    "errors" =>  $error
                ];
        
                $this -> view("register", $data);
            }

        }else{
            header("Location:".URL."/register");
        }
    }
    
    function email()
    {
        $response = array(
            'status'    => false,
            'data'      => false,
            'message'   => 'Esta intentando acceder a informaión privada'
        );
        //Validamos que la solicitud sea por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $request = json_decode(file_get_contents("php://input"));
            //Tomamos el atributo correo que se envio codificado
            //De igual forma pudo llegar otro atribuito o varios atributos{
            
            $email = $request->email;
            //Consultamos con el modelo y pasamos el correo
            $data = $this->model->getEmail($email);
            //Preguntamos si nos llega algun dato de la consulta

            if ($data) {
                $response['status']  = 200;
                $response['data']   = true;
                $response['message'] = 'el correo se encuentra registrado';
                $response['exist'] = true;
                
            } else {
                $response['status'] = 200;
                $response['message'] = 'estoy sobre escribiendo el mensaje';
                $response['exist'] = false;
            }
            //Codificamos la respuesta al cliente
            echo json_encode($response, http_response_code($response['status']) );
        }
    }
}