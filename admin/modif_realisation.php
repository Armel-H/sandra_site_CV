<?php
require('connexion.php');
?>
<?php
// Mise à jour d'une compétence.
if(isset($_POST['realisation'])){//par le nom du premier input
    $competence = addslashes($_POST['realisation']);
    $id_competence = $_POST['id_realisation'];

    $pdoCV->exec("UPDATE t_realisations SET realisation = '$realisation' WHERE id_realisation = '$id_realisation'");
     header ('location: realisation.php');
    exit();
}
//je récupère la compétence.
$id_realisation= $_GET['id_realisation']; // par l'id et $_GET
$resultat = $pdoCV->query("SELECT * FROM t_realisations WHERE id_realisation='$id_realisation' "); // La requète est égale à l'id
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
        <p><?php echo ($ligne_realisation['realisation']); ?></p>
        <p>Texte</p>
    <form action="modif_realisation.php" method="post">
        <label for="realisation">Réalisation</label>
        <input type="text" name="realisation" value="<?php echo ($ligne_realisation['realisation']); ?>">
        <input hidden name="id_realisation" value="<?php echo ($ligne_realisation['id_realisation']); ?>">
        <input type="submit" value="mettre à jour">


    </form>


    </body>
