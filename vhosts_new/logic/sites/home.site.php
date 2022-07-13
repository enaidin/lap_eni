<?php

namespace logic\sites;

class Process extends \logic\classes\Main
{

    public function __construct () {

        $this->data["db_result"] = self::$db->execute("SELECT * FROM eni");

        $this->displaySite("home");
        
    }

}