<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
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
        <p>Texte</p>
        <hr>
        <?php
        $resultat = $pdoCV -> query("SELECT * FROM t_competences");
        $ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
        ?>

        <h2>ACCUEIL admin</h2>

    </body>
</html>
