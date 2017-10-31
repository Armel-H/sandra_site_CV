
<?php
require('connexion.php');
$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php
// gestion des contenus de la BDD
// Insertion des compétences
if(isset($_POST['loisir'])) {// Si on a  posté une nouvelle compétence.
    if(!empty($_POST['loisir'])){// si compétence n'est aps vide.
        $loisir = addslashes($_POST['loisir']);
        $pdoCV->exec("INSERT INTO t_loisir VALUES (NULL, '$loisir',  '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
        header("location: loisirs.php");// Pour revenir sur la page.
        exit();
    }// Ferme le if(!empty)
}// ferme le if(isset)du formulaire

// Suppréssion d'une compétence
if(isset($_GET['id_loisir'])) {// ferme le if(isset) // Ici on récupère la competence par son id_ ds l'URL
    $efface = $_GET['id_loisir'];
    $resultat = "DELETE FROM t_loisir WHERE id_loisir ='$efface'";
    $pdoCV->query($resultat);
    header("location: loisirs.php");
}// Ferme le if(isset)

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin : <?= $ligne_utilisateur['pseudo']; ?> </title>

</head>
<body>
    <h1><?= $ligne_utilisateur['prenom']; ?></h1>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style_admin.css">

    <p></p>
    <hr>
    <?php
    $resultat = $pdoCV -> prepare("SELECT * FROM t_loisir WHERE utilisateur_id = '1'");
    $resultat -> execute();
    $nbr_loisir = $resultat->rowCount();
    //$ligne_loisir = $resultat -> fetch(PDO::FETCH_ASSOC);
    ?>

    <!-- <h2>J'ai <?php echo $nbr_loisir; ?> super loisirs</h2> -->
    <div class="container">
        <!-- On rows -->
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">loisirs</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>loisirs</th>
                                        <th>Suppression</th>
                                        <th>Modification</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php while($ligne_loisir = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                                    <td><?php echo $ligne_loisir['loisir'] ;?></td>
                                    <td><a href="loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>">supprimer</a></td>
                                    <td><a href="modif_loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?>">modifier</a></td>
                                </tr>
                            <?php } ?>
                        </table>
                        <hr>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"></h3>
                                </div>
                                <div class="panel-body">
                                    <form action="loisir.php" method="post">
                                        <div class="form-group">
                                            <label for="loisir">Loisir</label>
                                            <input type="text" name="loisir" id="loisir" class="form-control"  >
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="c_niveau">Niveau</label>
                                            <input type="text" name="c_niveau" id="c_niveau" class="form-control">
                                        </div> -->
                                        <div class="form-group">
                                            <button type="submit" name="Insérez" class="btn btn-warning btn-block">Envoyez</button>
                                        </div>
                                    </form>
                                    <h3>Insertion d'un loisir</h3>
                                    <!--Formulaire d'insertion -->

                                    <form action="loisirs.php" method="post">
                                        <label for="loisir">loisir</label>
                                        <input type="text" name="loisir" id="loisir" placeholder="Insérez un loisir">
                                        <input type="submit"name="Insérez">

                                    </form>

                                </body>
                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
                            <!-- Include all compiled plugins (below), or include individual files as needed -->
                            <script src="js/bootstrap.min.js"></script>
                        </html>
                                </html>
