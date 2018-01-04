<?php

$hote='localhost'; // le chemin vers le seuveur
$bdd='sandra_site_CV';// le nom de la base de données
$utilisateur='root';// le nom d'utilisateur pour se connecter
$passe='';//mot de passe de l'utilisateur local pc

$pdoCV = new PDO('mysql:host='.$hote.';dbname='.$bdd, $utilisateur, $passe);
// $pdoCV est le nom de la variable de connection qui sert partout ou l'on doit se servir de cette connexion
$pdoCV->exec("SET NAMES utf8");
