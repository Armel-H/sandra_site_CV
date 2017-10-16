
<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php
// gestion des contenus de la BDD
// Insertion des compétences
if(isset($_POST['competence'])) {// Si on a  posté une nouvelle compétence.
    if(!empty($_POST['competence']) && !empty($_POST['c_niveau'])){// si compétence n'est aps vide.
        $competence = addslashes($_POST['competence']);
        $c_niveau = addslashes($_POST['c_niveau']);
        $pdoCV->exec("INSERT INTO t_competences VALUES (NULL, '$competence', '$c_niveau', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
        header("location: competences.php");// Pour revenir sur la page.
        exit();
    }// Ferme le if(!empty)
}// ferme le if(isset)du formulaire

// Suppréssion d'une compétence
if(isset($_GET['id_competence'])) {// ferme le if(isset) // Ici on récupère la competence par son id_ ds l'URL
    $efface = $_GET['id_competence'];
    $resultat = "DELETE FROM t_competences WHERE id_competence ='$efface'";
    $pdoCV->query($resultat);
    header("location: competences.php");
}// Ferme le if(isset)

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
        $resultat = $pdoCV -> prepare("SELECT * FROM t_competences WHERE utilisateur_id = '1'");
        $resultat -> execute();
        $nbr_competences = $resultat->rowCount();
        //$ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
        ?>

        <h2>J'ai <?php echo $nbr_competences; ?> super compétences</h2>

        <table border="3">
            <tr>
                <th>Compétences</th>
                <th>Niveaux</th>
                <th>Suppression</th>
                <th>Modification</th>
            </tr>
            <tr>
                <?php while($ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                <td><?php echo $ligne_competence['competence'] ;?></td>
                <td><?php echo $ligne_competence['c_niveau']; ?></td>
                <td><a href="competences.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">supprimer</a></td>
                <td><a href="modif_competence.php?id_competence=<?php echo $ligne_competence['id_competence']; ?>">modifier</a></td>
            </tr>
        <?php } ?>
        </table>
        <hr>
        <h3>Insertion d'une compétence</h3>
        <!--Formulaire d'insertion -->

        <form action="competences.php" method="post">
            <label for="competence">compétence</label>
            <input type="text" name="competence" id="competence" placeholder="Insérez une compétence">
            <input type="text" name="c_niveau" id="c_niveau" placeholder="Insérez le niveau">
            <input type="submit"name="Insérez">

        </form>

    </body>
</html>
