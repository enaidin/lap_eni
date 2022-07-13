<?php

namespace logic\sites;

class Process extends \logic\classes\Main
{

    public function __construct () {

        if (isset($_POST["dia"]) && $_POST["dia"] != "") {
            $temp = self::$db->execute("SELECT * FROM diagnose");
            if (!in_array($_POST["dia"], array_column($temp, "dia_name")))
                $this->data["diagnosis"] = self::$db->execute("INSERT INTO diagnose(dia_name) VALUES (?)", array($_POST["dia"]));
            else
                $this->data["dia_exists"] = true;
        }
        
        $this->data["diagnosis"] = self::$db->execute("SELECT * FROM diagnose");

        $this->displaySite("diagnosis");

    }

}