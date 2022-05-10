<?php

namespace Adapter;

use PDO;
use PDOException;

class DB
{
    private  $pdo ;
    protected string $table;

    public function __construct()
    {
        try {
            $this->pdo = new PDO('mysql:host=localhost; dbname=hexagonale;charset=utf8','root','',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
        }
        catch (PDOException $e){ echo $e->getMessage();}
    }

    protected function getPdo()
    {
        if ($this->pdo === null) {
            $this->pdo = new DB();
        }
        return $this->pdo;
    }
}