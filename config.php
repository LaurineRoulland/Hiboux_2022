<?php 
// connexion à la BDD

$user = "leshi1827060";
$pass = "ncvuqkuuyk";
$host = "185.98.131.176";

// $host = "localhost";
// $user = "root";
// $pass = "";
try{
    $pdo = new PDO("mysql:host=".$host.";dbname=leshi1827060", $user, $pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
}catch(PDOException $e){
    print "Erreur = ". $e->getMessage() ."</br>";
}
