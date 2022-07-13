<?php

namespace logic\classes;

use \PDO;

class db 
{

    private $pdo;

    public function __construct () {

        $this->pdo = new PDO("mysql:host=localhost:3306;dbname=arztpraxis;charset=utf8", "root", "");

    }

    public function execute ($statement, $args = [], $returnType = "all") {

        $stmnt = $this->pdo->prepare($statement);
        
        try {
            $stmnt->execute($args);
        }
        catch (Exception $e) {
            echo $e->getCode().': '.$e->getMessage().'<br>';
        }

        switch ($returnType)
        {
            case "col":
            case "column":
                return $stmnt->fetchColumn(PDO::FETCH_ASSOC);
                break;
            case "arr":
            case "array":
                return $stmnt->fetch(PDO::FETCH_ASSOC);
                break;
            default:
                return $stmnt->fetchAll(PDO::FETCH_ASSOC);
                break;
        }

    }

}