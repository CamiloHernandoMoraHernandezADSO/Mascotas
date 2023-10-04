<?php
namespace adso\Mascotas\libs;
use adso\Mascotas\libs\Database;

class Model
{

    protected $connection;
    protected $db;

    public function __construct()
    {
        $this->db = new Database();
    }

}