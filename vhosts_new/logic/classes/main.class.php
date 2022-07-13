<?php

namespace logic\classes;

class Main 
{

    protected $data;
    static protected $db;
    static protected $functions;

    public function __construct () {

        self::$db = new db();
        self::$functions = new Functions();

        require_once LOGIC_DIR . "sites/home.site.php";

        $class = new \logic\sites\Process();

    }

    protected function displaySite ($site) {

        require_once ROOT_DIR . "templates/sites/$site.php";

    }

}