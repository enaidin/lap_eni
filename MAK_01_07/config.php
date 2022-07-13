<?php

define("ROOT_DIR", __DIR__ . "/");
define("LOGIC_DIR", ROOT_DIR . "logic/");

spl_autoload_register(function ($namespace) {

    $path = strtolower(str_replace("\\", "/", $namespace) . ".class.php");

    require_once ROOT_DIR . $path;

});