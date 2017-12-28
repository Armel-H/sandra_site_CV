<?php
require('connexion.php');

session_start();//à mettre dans toutes les pages de l'admin (même cette page)
  if(isset($_SESSION['connexion']) && $_SESSION['connexion']=='connecté'){//on établit que la variable de session est passée et contient bien le terme "connexion"
    $id_utilisateur=$_SESSION['id_utilisateur'];
    $prenom=$_SESSION['prenom'];
    $nom=$_SESSION['nom'];
    //echo $_SESSION['connexion'];
    //var_dump('$_SESSION');
  }else{//l'utilisateur n'est pas connecté
    header('location : authentification.php');
  }// ferme le else du if isset

$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php

if(isset($_POST['r_titre'])){ // Si on a posté une nouvelle compétence
    if(!empty($_POST['r_titre']) && !empty($_POST['r_soustitre']) && !empty($_POST['r_dates']) && !empty($_POST['r_description'])){ // Si compétence n'est pas vide
        $titre = addslashes($_POST['r_titre']);
        $sousTitre = addslashes($_POST['r_soustitre']);
        $dates = addslashes($_POST['r_dates']);
        $description = addslashes($_POST['r_description']);
        $pdoCV -> exec("INSERT INTO t_realisations (r_titre, r_soustitre, r_dates, r_description, utilisateur_id) VALUES ('$titre', '$sousTitre', '$dates', '$description', '1')"); // mettre $id_utilisateur quand on l'aura dans la variable de session
        header("location:realisation.php");
        exit();

    }// ferme if n'est pas vide
}

// Supression d'une compétence
if(isset($_GET['id_realisation'])){
    // on récupère la compétence par son ID dans l'url
    $efface = $_GET['id_realisation'];
    $resultat = " DELETE FROM t_realisations WHERE id_realisation = '$efface' ";
    $pdoCV ->query($resultat);
    header("location: realisation.php");
} // ferme le if isset supression

//$resultat = $pdoCV -> prepare("SELECT * FROM t_formations WHERE utilisateur_id = '1'");
//$resultat -> execute();
//$nbr_formation =  $resultat -> rowCount();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin : <?= $ligne_utilisateur['pseudo']; ?></title>
    <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style_admin.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- nav en include -->
    <?php include("inc/include_nav.php"); ?>
        <h3>Admin <?= $ligne_utilisateur['prenom']; ?></h3>
    </div>
    <?php
    $resultat = $pdoCV -> prepare("SELECT * FROM t_realisations WHERE utilisateur_id = '1'");
    $resultat -> execute();
    $nbr_realisation = $resultat->rowCount();
    //$ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Liste des réalisations</h3>
                    </div>
                    <div class="panel-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Titre</th>
                                    <th>Soustitre</th>
                                    <th>Dates</th>
                                    <th>Description</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>

                                </tr>
                                <tr>
                                    <?php while($ligne_realisation = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                                        <td><?php echo $ligne_realisation['r_titre'] ;?></td>
                                        <td><?php echo $ligne_realisation['r_soustitre'] ;?></td>
                                        <td><?php echo $ligne_realisation['r_dates'] ;?></td>
                                        <td><?php echo $ligne_realisation['r_description'] ;?></td>
                                        <td><a href="modif_realisation.php?id_realisation=<?= $ligne_realisation['id_realisation']; ?>">Modifier</a></td>
                                        <td><a href="realisation.php?id_realisation=<?= $ligne_realisation['id_realisation']; ?>">Supprimer</a></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-md-4">
                 <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Insertion d'une réalisation</h3>
                    </div>
                    <div class="panel-body">
                        <form action="realisation.php" method="post">
                            <div class="form-group">
                                <label for="r_titre">Titre</label>
                                <input type="text" class="form-control" id="r_titre" name="r_titre" placeholder="Titre">
                            </div>
                            <div class="form-group">
                                <label for="r_soustitre">Sous-titre</label>
                                <input type="text" class="form-control" id="r_soustitre" name="r_soustitre" placeholder="Sous-titre">
                            </div>
                            <div class="form-group">
                                <label for="r_dates">Dates</label>
                                <input type="text" class="form-control" id="r_dates" name="r_dates" placeholder="Insérez les dates">
                            </div>
                            <div class="form-group">
                                <label for="r_description">Description</label>
                                <textarea class="form-control" id="editor1" name="r_description" placeholder="Décrire la realisation"></textarea>
                            </div>
                            <script >
                              CKEDITOR.replace('editor1');
                            </script>
                            <button type="submit" class="btn btn-info btn-block couleur-btn">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <hr>
    <?php
    $resultat = $pdoCV -> query("SELECT * FROM t_realisations");
    $ligne_realisation = $resultat -> fetch(PDO::FETCH_ASSOC);

    ?>


    <!-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel-footer"></div>
                </div>
            </div>
        </div>
    </footer> -->


</div>
</div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>

</html>
