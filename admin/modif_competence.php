<?php
require('connexion.php');
?>
<?php
//je récupère la compétence.
$id_competence = $_GET['id_competence']; // par l'id et $_GET
$resultat = $pdoCV->query("SELECT * FROM t_competences WHERE id_competence ='$id_competence' "); // La requète est égale à l'id
$ligne_competence = $resultat -> fetch();


?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <?php $resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat -> fetch();
        ?>
        <title>Admin : <?= $ligne_utilisateur['pseudo']; ?> </title>
    </head>
    <body>
        <h1>Admin <?= $ligne_utilisateur['prenom']; ?></h1>
        <p>Texte</p>
        <hr>
        <h2>Modifier une compétence</h2>
        <p><?php echo ($ligne_competence['competence']) ?></p>
        <p>Texte</p>

    </body>
</html>
