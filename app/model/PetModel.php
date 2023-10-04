<?php

namespace adso\Mascotas\model;

use adso\Mascotas\libs\Model;
use adso\Mascotas\libs\Helper;

class PetModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function allSelect()
    {
        $connection = $this->db->getConnection();

        $sql = "SELECT pets.id,SUBSTRING_INDEX(pets.name,' ',2) as name, pets.photo, SUBSTRING_INDEX(races.name,' ',2) as race FROM pets INNER JOIN races on pets.race_id = races.id
        ORDER BY `pets`.`id` ASC";



        $stm = $connection->prepare($sql);
        $stm->execute();

        $datos = $stm->fetchAll();

        foreach ($datos as &$row) {
            $row['id'] = Helper::encrypt($row['id']);
        }

        return $datos;
    }

    function allSelectP()
    {
        $connection = $this->db->getConnection();

        $sql = "SELECT pets.id,SUBSTRING_INDEX(pets.name,' ',2) as name, pets.photo, SUBSTRING_INDEX(races.name,' ',2) as race FROM pets INNER JOIN races on pets.race_id = races.id WHERE pets.categorie_id = 1 ORDER BY `pets`.`id` ASC";

        $stm = $connection->prepare($sql);
        $stm->execute();

        return $stm->fetchAll();
    }

    function allSelectG()
    {
        $connection = $this->db->getConnection();

        $sql = "SELECT pets.id,SUBSTRING_INDEX(pets.name,' ',2) as name, pets.photo, SUBSTRING_INDEX(races.name,' ',2) as race FROM pets INNER JOIN races on pets.race_id = races.id WHERE pets.categorie_id = 2 ORDER BY `pets`.`id` ASC";

        $stm = $connection->prepare($sql);
        $stm->execute();

        return $stm->fetchAll();
    }

    function showSelect($idDesencrip)
    {
        //die($idDesencrip);
        $connection = $this->db->getConnection();
        
        $sql = "SELECT pets.name AS name, pets.photo as photo, races.name as race,categories.name AS category,genders.name AS gender FROM pets INNER JOIN races ON pets.race_id = races.id INNER JOIN categories on pets.categorie_id = categories.id INNER JOIN genders ON pets.gender_id = genders.id WHERE pets.id = $idDesencrip";

        $stm = $connection->prepare($sql);
        $stm->execute();

        return $stm->fetch();
    }

    function insert($name, $raza, $category, $url_insert, $genero)
    {
        $connection = $this->db->getConnection();

        $sql = "INSERT INTO `pets`(`name`, `race_id`, `categorie_id`, `photo`, `gender_id`) VALUES (:nombre, :raza, :categoria, :foto, :genero)";

        $stm = $connection->prepare($sql);
        $stm->bindValue(":nombre", $name);
        $stm->bindValue(":raza", $raza);
        $stm->bindValue(":categoria", $category);
        $stm->bindValue(":foto", $url_insert);
        $stm->bindValue(":genero", $genero);

        $stm->execute();

        return $stm->rowCount();
    }

    function update($name, $raza, $category, $url_insert, $genero, $id)
    {

        
        $connection = $this->db->getConnection();

        $sql = "UPDATE `pets` SET `name`= :nombre,`race_id`=:raza,`categorie_id`=:categoria,`photo`=:foto,`gender_id`=:genero WHERE pets.id = :id";

        $stm = $connection->prepare($sql);
        $stm->bindValue(":nombre", $name);
        $stm->bindValue(":raza", $raza);
        $stm->bindValue(":categoria", $category);
        $stm->bindValue(":foto", $url_insert);
        $stm->bindValue(":genero", $genero);
        $stm->bindValue(":id", $id);

        $stm->execute();

        return $stm->rowCount();
    }

    function delete($id)
    {
        $connection = $this->db->getConnection();

        $sql = "DELETE FROM `pets` WHERE pets.id = :id";

        $stm = $connection->prepare($sql);

        $stm->bindValue(":id", $id);

        $stm->execute();
    }

    function pathPhoto($id)
    {

        $connection = $this->db->getConnection();

        $sql = "SELECT photo FROM pets WHERE pets.id = :id";

        $stm = $connection->prepare($sql);

        $stm->bindValue(":id", $id);

        $stm->execute();

        return $stm->fetch();
    }
}