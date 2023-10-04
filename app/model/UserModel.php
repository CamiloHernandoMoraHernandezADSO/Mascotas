<?php

namespace adso\Mascotas\model;

use adso\Mascotas\libs\Model;

class UserModel extends Model
{
 function __construct()
 {
    parent::__construct();
 }
 function validate($user, $password)
 {
    $password = hash_hmac("sha512", $password, MASTER);
    $password = substr($password, 0, 50);

    $connection = $this->db->getConnection();

    $sql = "SELECT * FROM users WHERE 	email = :correo AND password = :clave";

    $stm = $connection->prepare($sql);
    $stm->bindValue(":clave", $password);
    $stm->bindValue(":correo", $user);
    $stm->execute();

    return $stm->fetch();
 }

 function insert($user, $mail, $passwor){
   $passwor = hash_hmac("sha512", $passwor, MASTER);
   $passwor = substr($passwor, 0, 50);

   $connection = $this->db->getConnection();

   $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (:nombre, :correo, :contra)";

   $stm = $connection -> prepare($sql);
   $stm ->bindValue(':nombre',$user);
   $stm ->bindValue(':correo',$mail);
   $stm ->bindValue(':contra',$passwor);
   $stm -> execute();

   return $stm-> rowCount();
 }

function getEmail($correo)
{
   $connection = $this->db->getConnection();
   $sql = "SELECT email FROM users WHERE email = :correo";
   $stm = $connection->prepare($sql);
   $stm->bindValue(":correo", $correo);
   $stm->execute();
   return $stm->fetch();
}

function validateEmail ($email) {
   $sql = "SELECT id, email FROM users WHERE email = :correo";
   $connection = $this->db->getConnection();
   $stm = $connection->prepare($sql);
   $stm->bindValue(":correo", $email);
   $stm->execute();
   return $stm->fetch();
}

function updatePassword($id, $password)
{   
   //die($id);
   $password = hash_hmac("sha512", $password, MASTER);
   $password = substr($password, 0, 50);
   
   $sql = "UPDATE users SET password = :clave WHERE id = :id";
   $connection = $this->db->getConnection();
   $stm = $connection->prepare($sql);
   $stm->bindValue(":clave", $password);
   $stm->bindValue(":id", $id);

   return $stm->execute();
}



}