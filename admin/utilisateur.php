
<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php
// gestion des contenus de la BDD
// Insertion des compétences
if(isset($_POST['utilisateur'])) {// Si on a  posté une nouvelle compétence.
    if(!empty($_POST['utilisateur'])){// si compétence n'est aps vide.
        $utilisateur= addslashes($_POST['utilisateur']);
        $pdoCV->exec("INSERT INTO t_utilisateur VALUES (NULL, '$utilisateur' , '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
        header("location: utilisateur.php");// Pour revenir sur la page.
        exit();
    }// Ferme le if(!empty)
}// ferme le if(isset)du formulaire

// Suppréssion d'une compétence
if(isset($_GET['id_utilisateur'])) {// ferme le if(isset) // Ici on récupère la competence par son id_ ds l'URL
    $efface = $_GET['id_utlisateur'];
    $resultat = "DELETE FROM t_utilisateur WHERE id_utilisateur ='$efface'";
    $pdoCV->query($resultat);
    header("location: utilisateur.php");
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
        $resultat = $pdoCV -> prepare("SELECT * FROM t_utilisateur WHERE utilisateur_id = '1'");
        $resultat -> execute();
        $nbr_competences = $resultat->rowCount();
        //$ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
        ?>

        <h2>Profil de <?php echo $ligne_utilisateur['prenom']; ?></h2>

        <table border="3">
            <tr>
                <th>Prénom : <?php echo $ligne_utilisateur['prenom']; ?></th>
                <th>Nom : <?php echo $ligne_utilisateur['nom']; ?></th><br>
                <th>Email : <?php echo $ligne_utilisateur['email']; ?></th>
                <th>Téléphone : <?php echo $ligne_utilisateur['telephone']; ?></th>
                <th>Pseudo : <?php echo $ligne_utilisateur['pseudo']; ?></th>
                <th>Avatar</th>
                <th>Age : <?php echo $ligne_utilisateur['age']; ?></th>
                <th>Date de naissance : <?php echo $ligne_utilisateur['date_de_naissance']; ?></th>
                <th>Sexe : <?php echo $ligne_utilisateur['sexe']; ?></th>
                <th>Etat Civil : <?php echo $ligne_utilisateur['etat_civil']; ?></th>
                <th>Adresse : <?php echo $ligne_utilisateur['adresse']; ?></th>
                <th>Code Postal : <?php echo $ligne_utilisateur['code_postal']; ?></th>
                <th>Ville : <?php echo $ligne_utilisateur['ville']; ?></th>
                <th>Pays : <?php echo $ligne_utilisateur['pays']; ?></th>
                <th>Site Web : <?php echo $ligne_utilisateur['site_web']; ?></th>
            </tr>
            <tr>
                <?php while($ligne_utilisteur = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                <td><?php echo $ligne_utilisateur['utilisateur'] ;?></td>
                <td><?php echo $ligne_utilisateur['nom']; ?></td>
                <td><?php echo $ligne_utilisateur['prenom']; ?></td>
                <td><?php echo $ligne_utilisateur['email']; ?></td>
                <td><?php echo $ligne_utilisateur['telephone']; ?></td>
                <td><?php echo $ligne_utilisateur['pseudo']; ?></td> -->
                <td><?php echo $ligne_utilisateur['avatar']; ?></td>
                <td><?php echo $ligne_utilisateur['age']; ?></td>
                <td><?php echo $ligne_utilisateur['date_de_naissance']; ?></td>
                <td><?php echo $ligne_utilisateur['etat_civil']; ?></td>
                <td><?php echo $ligne_utilisateur['adresse']; ?></td>
                <td><?php echo $ligne_utilisateur['code_postal']; ?></td>
                <td><?php echo $ligne_utilisateur['ville']; ?></td>
                <td><?php echo $ligne_utilisateur['pays']; ?></td>
                <td><?php echo $ligne_utilisateur['site_web']; ?></td>

            </tr>
        <?php } ?>
        </table>
        <hr>
        <!-- <h3>Insertion d'une compétence</h3> -->
        <!--Formulaire d'insertion -->

        <!-- <form action="competences.php" method="post"> -->
            <!-- <label for="competence">compétence</label>
            <input type="text" name="competence" id="competence" placeholder="Insérez une compétence">
            <input type="text" name="c_niveau" id="c_niveau" placeholder="Insérez le niveau">
            <input type="submit"name="Insérez">

        </form> -->

    </body>
</html>
