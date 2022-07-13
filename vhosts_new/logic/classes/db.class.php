<?php

namespace logic\classes;

use \PDO;

class db 
{

    private $pdo;

    public function __construct () {

        // $this->pdo = new PDO();

    }

    public function execute ($statement, $args = [], $returnType = "all") {

        $stmnt = $this->pdo->prepare($statement);
        $stmnt->execute($args);

        switch ($returnType)
        {
            case "col":
            case "column":
                return $stmnt->fetchColumn();
            case "arr":
            case "array":
                return $stmnt->fetch();
            default:
                return $stmnt->fetchAll();
        }

    }

}