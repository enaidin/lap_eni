<?php

$pdo = new PDO("mysql:host=localhost:3306;dbname=arztpraxis;charset=utf8", "root", "");

$stmnt = $pdo->prepare("DELETE FROM diagnose WHERE dia_id = ?");
$res = $stmnt->execute(array($_POST["dia_id"]));