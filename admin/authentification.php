<?php require('connexion.php');

session_start();//à mettre dans toutes les pages de l'admin (même cette page)
$msg_auth_erreur='';// on initialise la variable en cas d'erreur.

// pour se déconnecter de l'admin (à mettre dans toutes les pages aussi)
if(isset($_GET['quitter'])){// on récupère le terme quitter dans l'URL
     $_SESSION['connexion']='';// On vide les variables de session
     $_SESSION['id_utilisateur']='';
     $_SESSION['prenom']='';
     $_SESSION['nom']='';

     unset($_SESSION['connexion']);//UNSET détruit les variables qui ont été définies.
     session_destroy();
     //header('location:../index.html');
}// fermeture du if(isset de la déconnexion)

if(isset($_POST['connexion'])){// on envoie le formulaire avec le nom du bouton, on clique dessus
     $email = addslashes($_POST['email']);
     $mdp = addslashes($_POST['mdp']);
     $sql = $pdoCV->prepare("SELECT * FROM t_utilisateur WHERE email='$email' AND mdp='$mdp'");// on vérifie courriel et mot de passe
     $sql->execute();
     $nbr_utilisateur = $sql->rowCount();// on compte s'il est dans la table, le compte répond 1 s'il y est, 0 s'il n'y est pas.
     if($nbr_utilisateur==0){// il n'est pas.
          $msg_auth_erreur="Erreur d'authentification ! ";
     }else{//on le trouve, il est inscrit
          $ligne_utilisateur = $sql->fetch();// on cherche ses infos
          $_SESSION['connexion']='connecté';
          $_SESSION['id_utilisateur']=$ligne_utilisateur['id_utilisateur'];
          $_SESSION['prenom']=$ligne_utilisateur['prenom'];
          $_SESSION['nom']=$ligne_utilisateur['nom'];
          header('location: index.php');
     }// ferme le if else

}// ferme le if isset
?>
<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <link rel="stylesheet" href="css/style_admin.css"/>


     <title>Authentification</title>
</head>
<body>
     <h1>S'identifier</h1>
     <hr>
     <fieldset>
          <form class="authentification.php" method="post">
               <label for="email">Courriel</label>
               <input type="email" name="email" placeholder="Votre courriel" size="50" required>
               <br><br>
               <label for="mdp">Mot de passe</label>
               <input type="password" name="mdp" placeholder="Votre mot de passe"size="50" required>
               <br><br>
               <button name="connexion" type="submit">Connexion</button>
               <br>
     </fieldset>

     </form>

<?php include("inc/include_footer.php"); ?>
</html>
