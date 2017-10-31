<?php
require('connexion.php');
?>
<?php
// Mise à jour d'une compétence.
if(isset($_POST['competence'])){//par le nom du premier input
    $competence = addslashes($_POST['competence']);
    $c_niveau = addslashes($_POST['c_niveau']);
    $id_competence = $_POST['id_competence'];

    $pdoCV->exec("UPDATE t_competences SET competence = '$competence', c_niveau ='$c_niveau' WHERE id_competence = '$id_competence'");
     header ('location: competence1.php');
    exit();
}
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
        <p><?php echo ($ligne_competence['competence']); ?></p>
        <p>Texte</p>
    <form action="modif_competence.php" method="post">
        <label for="competence">Compétence</label>
        <input type="text" name="competence" value="<?php echo ($ligne_competence['competence']); ?>">
        <input type="number" name="c_niveau" value="<?php echo ($ligne_competence['c_niveau']); ?>">

        <input hidden name="id_competence" value="<?php echo ($ligne_competence['id_competence']); ?>">
        <input type="submit" value="mettre à jour">


    </form>


    </body>
</html>
