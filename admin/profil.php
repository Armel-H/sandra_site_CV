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
    header('location : index.php');
  }// ferme le else du if isset

$resultat = $pdoCV -> query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '$id_utilisateur'");
$ligne_utilisateur = $resultat -> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    </div>
    <div class="container">
                    <!-- On rows -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title">Profil</h3>
                  </div>
                  <div class="panel-body">
                      <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <table border="3">
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Pseudo</th>
                            <th>Avatar</th>
                            <th>Age</th>
                            <th>Date de naissancessance</th>
                            <th>Sexe</th>
                            <th>Etat Civil</th>
                            <th>Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Pays</th>
                            <th>Site Web</th>
                        </tr>
                        <tr>

                        <td><?php echo $ligne_utilisateur['prenom']; ?></td>
                        <td><?php echo $ligne_utilisateur['nom']; ?></td>
                        <td><?php echo $ligne_utilisateur['email']; ?></td>
                        <td><?php echo $ligne_utilisateur['telephone']; ?></td>
                        <td><?php echo $ligne_utilisateur['pseudo']; ?></td>
                        <td><?php echo $ligne_utilisateur['avatar']; ?></td>
                        <td><?php echo $ligne_utilisateur['age']; ?></td>
                        <td><?php echo $ligne_utilisateur['date_de_naissance']; ?></td>
                        <td><?php echo $ligne_utilisateur['sexe']; ?></td>
                        <td><?php echo $ligne_utilisateur['etat_civil']; ?></td>
                        <td><?php echo $ligne_utilisateur['adresse']; ?></td>
                        <td><?php echo $ligne_utilisateur['code_postal']; ?></td>
                        <td><?php echo $ligne_utilisateur['ville']; ?></td>
                        <td><?php echo $ligne_utilisateur['pays']; ?></td>
                        <td><?php echo $ligne_utilisateur['site_web']; ?></td>
                    </tr>
                  </table>
                  </div>

                </div>
            </div>
        </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title"></h3>
                  </div>
                  <div class="panel-body">
                      <form>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-warning btn-block">Submit</button>
</form>
                  </div>
                </div>
            </div>
        </div>


    <hr>
    <?php
    $resultat = $pdoCV -> query("SELECT * FROM t_competences");
    $ligne_competence = $resultat -> fetch(PDO::FETCH_ASSOC);
    ?>


    


    </div>
    </div>
  </div>
    </body>
    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
          <div class="panel-footer">Panel footer</div>
            </div>
      </div>
  </div>
  </footer


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</html>
