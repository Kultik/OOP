<?php
require_once "connect.php";
$pdo = DataBase::connect("my_database");
var_dump($pdo);
$count = new DataBase;
echo $count -> countTable($pdo, "*", "eleve");
?>