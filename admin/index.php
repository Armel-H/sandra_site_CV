<?php 
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);




?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Admin : <?= $ligne_utilisateur['pseudo']; ?> </title>
    </head>
    <body>
        <h1>Admin <?= $ligne_utilisateur['prenom']; ?></h1>
        
    </body>
</html>