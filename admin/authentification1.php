<?php require('connexion.php');

session_start();//à mettre dans toutes les pages de l'admin (même cette page)
     $msg_auth_erreur='';// on initialise la variable en cas d'erreur.

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
         <link href="css/style_admin.css" rel="stylesheet">

         <title>Authentification </title>
     </head>
     <body>
         <h1>Admin : s'authentifier</h1>
         <hr>
         <form class="authentifier1.php" method="post">
             <label for="email">Courriel</label>
             <input type="email"name="email" placeholder="Votre courriel"required>
             <br>
             <label for="mdp">Mot de passe</label>
             <input type="password" name="mdp" placeholder="Votre mot de passe"required>
             <br>
             <button name="connexion" type="submit">Connexion</button>
             <br>

         </form>
     </body>
 </html>
