<?php
require('connexion.php');

// mise à jour d'une compétence
if(isset($_POST['loisir'])){ // par le nom d'une premier input
    $loisir = addslashes($_POST['loisir']);
    $id_loisir = $_POST['id_loisir'];

    $pdoCV -> exec("UPDATE t_loisir SET loisir = '$loisir' WHERE id_loisir = '$id_loisir'");
    header('location: loisirs.php');
    exit();
}

// je récupère la compétence
$id_loisir = $_GET['id_loisir']; // par l'id et get
$resultat = $pdoCV -> query("SELECT * FROM t_loisir WHERE id_loisir = '$id_loisir'"); // la requete eest égale à l'ID
$ligne_loisir = $resultat -> fetch();

//pour afficher l'utilisateur
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch();

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin : <?= $ligne_utilisateur['pseudo']?> </title>
        </head>
    </head>
    <body>
        <h1>Admin <?= $ligne_utilisateur['prenom']?></h1>
        <p>Texte</p>
        <hr>

        <h2>Modification d'un loisir </h2>
        <p><?= $ligne_loisir['loisir'] ?></p>

        <form action="#" method="post">
            <label for="loisir">Loisir :</label><br>
            <input type="text" name="loisir" id ="loisir" value="<?= $ligne_loisir['loisir'] ?>"><br><br>

            <input hidden name="id_loisir" value="<?= $ligne_loisir['id_loisir'] ?>">

            <input type="submit" name="" value="Modifier">
        </form>
    </body>
</html>
