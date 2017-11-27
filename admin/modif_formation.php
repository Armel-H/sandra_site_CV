<?php
require('connexion.php');

?>
<?php
// Mise à jour d'une formation.
if(isset($_POST['f_titre'])){//par le nom du premier input
    $titre = addslashes($_POST['f_titre']);
    $soustitre = addslashes($_POST['f_soustitre']);
    $dates = addslashes($_POST['f_dates']);
    $description = addslashes($_POST['f_description']);
    $id_formation = $_POST['id_formation'];

    $pdoCV->exec("UPDATE t_formations SET f_titre ='$titre', f_soustitre = '$soustitre', f_dates = '$dates', f_description = '$description' WHERE id_formation = '$id_formation'");
     header ('location: formation.php');
    exit();
}
//je récupère la formation.
$id_formation = $_GET['id_formation']; // par l'id et $_GET
$resultat = $pdoCV->query("SELECT * FROM t_formations WHERE id_formation ='$id_formation' "); // La requète est égale à l'id
$ligne_formation = $resultat -> fetch();


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
        <h2>Modifier une formation</h2>
        <p><?php echo ($ligne_formation['f_titre']); ?></p>
        <p>Texte</p>
    <form action="modif_formation.php" method="post">
        <label for="formation">Formations</label>
        <input type="text" name="f_titre" value="<?php echo ($ligne_formation['f_titre']); ?>">
        <input type="text" name="f_soustitre" value="<?php echo ($ligne_formation['f_soustitre']); ?>">
        <input type="number" name="f_dates" value="<?php echo ($ligne_formation['f_dates']); ?>">
        <input type="text" name="f_description" value="<?php echo ($ligne_formation['f_description']); ?>">

        <input hidden name="id_formation" value="<?php echo ($ligne_formation['id_formation']); ?>">
        <input type="submit" value="mettre à jour">


    </form>


    </body>
</html>
