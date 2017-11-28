<?php
require('connexion.php');

?>
<?php
// Mise à jour d'une experience.
if(isset($_POST['e_titre'])){//par le nom du premier input
    $titre = addslashes($_POST['e_titre']);
    $soustitre = addslashes($_POST['e_soustitre']);
    $dates = addslashes($_POST['e_dates']);
    $description = addslashes($_POST['e_description']);
    $id_experience = $_POST['id_experience'];

    $pdoCV->exec("UPDATE t_experiences SET e_titre ='$titre', e_soustitre = '$soustitre', e_dates = '$dates', e_description = '$description' WHERE id_experience= '$id_experience'");
     header ('location: experience.php');
    exit();
}
//je récupère l'experience.
$id_experience = $_GET['id_experience']; // par l'id et $_GET
$resultat = $pdoCV->query("SELECT * FROM t_experiences WHERE id_experience ='$id_experience' "); // La requète est égale à l'id
$ligne_experience = $resultat -> fetch();


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
        <h2>Modifier une experience</h2>
        <p><?php echo ($ligne_experience['e_titre']); ?></p>
        <p>Texte</p>
    <form action="modif_experience.php" method="post">
        <label for="experience">Experience</label>
        <input type="text" name="e_titre" value="<?php echo ($ligne_experience['e_titre']); ?>">
        <input type="text" name="e_soustitre" value="<?php echo ($ligne_experience['e_soustitre']); ?>">
        <input type="number" name="e_dates" value="<?php echo ($ligne_experience['e_dates']); ?>">
        <input type="text" name="e_description" value="<?php echo ($ligne_experience['e_description']); ?>">

        <input hidden name="id_experience" value="<?php echo ($ligne_experience['id_experience']); ?>">
        <input type="submit" value="mettre à jour">


    </form>


    </body>
</html>
