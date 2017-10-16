<?php
require('connexion.php');
?>
<?php
// Mise à jour d'une compétence.
if(isset($_POST['loisir'])){//par le nom du premier input
    $loisir = addslashes($_POST['loisir']);
    $id_loisir = $_POST['id_loisir'];

    $pdoCV->exec("UPDATE t_loisirs SET loisir = '$loisir'  WHERE id_loisir = '$id_loisir'");
    header ('location: loisirs.php');
    exit();
}
//je récupère la compétence.
$id_loisir = $_GET['id_loisir']; // par l'id et $_GET
$resultat = $pdoCV->query("SELECT * FROM t_loisirs WHERE id_loisir ='$id_loisir' "); // La requète est égale à l'id
$ligne_loisir = $resultat -> fetch();


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
        <h2>Modifier un loisir</h2>
        <p><?php echo ($ligne_loisir['loisir']); ?></p>

        <p>Texte</p>
    <form action="modif_loisirs.php" method="post">
        <label for="loisir">Loisir</label>
        <input type="text" name="loisir" value="<?php echo ($ligne_loisir['loisir']); ?>">
        <input hidden name="id_loisir" value="<?php echo ($ligne_loisir['id_loisir']); ?>">
        <input type="submit" value="mettre à jour">


    </form>


    </body>
</html>
