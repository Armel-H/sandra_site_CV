<?php
require('connexion.php');

?>
<?php
// Mise à jour d'une formation.
if(isset($_POST['r_titre'])){//par le nom du premier input
    $titre = addslashes($_POST['r_titre']);
    $soustitre = addslashes($_POST['r_soustitre']);
    $dates = addslashes($_POST['r_dates']);
    $description = addslashes($_POST['r_description']);
    $id_realisation = $_POST['id_realisation'];

    $pdoCV->exec("UPDATE t_realisations SET r_titre ='$titre', r_soustitre = '$soustitre', r_dates = '$dates', r_description = '$description' WHERE id_realisation = '$id_realisation'");
     header ('location: realisation.php');
    exit();
}
//je récupère la formation.
$id_realisation = $_GET['id_realisation']; // par l'id et $_GET
$resultat = $pdoCV->query("SELECT * FROM t_realisations WHERE id_realisation ='$id_realisation' "); // La requète est égale à l'id
$ligne_realisation = $resultat -> fetch();


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
        <h2>Modifier une réalisation</h2>
        <p><?php echo ($ligne_realisation['r_titre']); ?></p>
        <p>Texte</p>
    <form action="modif_realisation.php" method="post">
        <label for="realisation">Réalisation</label>
        <input type="text" name="r_titre" value="<?php echo ($ligne_realisation['r_titre']); ?>">
        <input type="text" name="r_soustitre" value="<?php echo ($ligne_realisation['r_soustitre']); ?>">
        <input type="number" name="r_dates" value="<?php echo ($ligne_realisation['r_dates']); ?>">
        <input type="text" name="r_description" value="<?php echo ($ligne_realisation['r_description']); ?>">

        <input hidden name="id_realisation" value="<?php echo ($ligne_realisation['id_realisation']); ?>">
        <input type="submit" value="mettre à jour">


    </form>


    </body>
</html>
