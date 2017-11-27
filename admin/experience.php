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
    header('location : authentification1.php');
  }// ferme le else du if isset

$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>
<?php
//comment
// gestion des contenus de la BDD
// Insertion des expériences
if(isset($_POST['experience'])) {// Si on a  posté une nouvelle compétence.
    if(!empty($_POST['experience'])){// si compétence n'est pas vide.
        $experience = addslashes($_POST['experience']);
        $pdoCV->exec("INSERT INTO t_experiences VALUES (NULL, '$experience', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
        header("location: experience.php");// Pour revenir sur la page.
        exit();
    }// Ferme le if(!empty)
}// ferme le if(isset)du formulaire

// Suppréssion d'une compétence
if(isset($_GET['id_experience'])) {// ferme le if(isset) // Ici on récupère la competence par son id_ ds l'URL
    $efface = $_GET['id_experience'];
    $resultat = "DELETE FROM t_experiences WHERE id_experience ='$efface'";
    $pdoCV->query($resultat);
    header("location: experience.php");
}// Ferme le if(isset)
// include("include_nav.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">

    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin : <?= $ligne_utilisateur['pseudo']; ?></title>

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
    <?php include("include_nav.php"); ?>
        <h3>Admin <?= $ligne_utilisateur['prenom']; ?></h3>
    <?php
    $resultat = $pdoCV -> prepare("SELECT * FROM t_experiences WHERE utilisateur_id = '1'");
    $resultat -> execute();
    $nbr_experience = $resultat->rowCount();
    //$ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="container">
        <!-- On rows -->
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Expériences professionnelles</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Expériences</th>
                                        <th>Modification</th>
                                        <th>Suppression</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php while($ligne_experience = $resultat -> fetch(PDO::FETCH_ASSOC) ) {?>
                                            <td><?php echo $ligne_experience['experience'] ;?></td>
                                            <td><a href="experience.php?id_experience=<?php echo $ligne_experience['id_experience']; ?>">supprimer</a></td>
                                            <td><a href="modif_experience.php?id_experience=<?php echo $ligne_experience['id_experience']; ?>">modifier</a></td>
                                        </tr>
                                    <?php } ?>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Insérer une expérience</h3>
                    </div>
                    <div class="panel-body">
                        <form action="experience.php" method="post">
                            <div class="form-group">
                                <label for="experience">experience</label>
                                <input type="text" name="experience" id="experience" class="form-control"  >
                            </div>
                            <div class="form-group">
                                <button type="submit" name="Insérez" class="btn btn-warning btn-block">Envoyez</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <hr>
            <?php
            $resultat = $pdoCV -> query("SELECT * FROM t_experiences");
            $ligne_experience = $resultat -> fetch(PDO::FETCH_ASSOC);
            ?>


            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-footer"></div>
                        </div>
                    </div>
                </div>
            </footer>


        </div>
    </div>
</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</html>
