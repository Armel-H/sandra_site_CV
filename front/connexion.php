<?php

$hote='localhost'; // le chemin vers le seuveur
$bdd='sandra_site_cv';// le nom de la base de données
$utilisateur='root';// le nom d'utilisateur pour se connecter
$passe='';//mot de passe de l'utilisateur local pc

$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
// $pdoCV est le nom de la variable de connection qui sert partout ou l'on doit se servir de cette connexion
$pdoCV->exec("SET NAMES utf8");

/*
* connexion.php
* connexion à la BDD
*/
//on créé une nouvelle connexion dans un bloc TRY
try {
  $bdd = new PDO('mysql:host=localhost; dbname=sandra_site_cv', 'root', '') or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8'); //on force la prise en charge de l'UTF8
} catch (Exception $e) {
  die('Erreur : ' . $e->getMessage());
}
