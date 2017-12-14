<?php
//Formulaire/index.php
// on récupère la classe Contact
require('Contact.class.php');

// on vérifie que le formulaire a été posté
if (!empty($_POST)) {
  // on éclate le $_POST en tableau qui permet d'accéder directement aux champs par des variables
  extract($_POST);
  //var_dump($_POST);
  // on effectue une validation des données du formulaire et on vérifie la validité de l'email
  $valid = (empty($c_nom) || empty($c_email) || !filter_var($c_email, FILTER_VALIDATE_EMAIL) || empty($c_sujet) || empty($c_message)) ? false : true; // écriture ternaire pour if / else
  $erreurnom = (empty($c_nom)) ? 'Indiquez votre nom' : null;
  $erreuremail = (empty($c_email) || !filter_var($c_email, FILTER_VALIDATE_EMAIL)) ? 'Entrez un email valide' : null;
  $erreursujet = (empty($c_sujet)) ? 'Indiquez un sujet' : null;
  $erreurmessage = (empty($c_message)) ? 'Parlez donc !!' : null;
  // si tous les champs sont correctement renseignés
  if ($valid) {
    // on crée un nouvel objet (ou une instance) de la class Contact.class.php
    $contact = new Contact();
    // on utilise la méthode insertContact pour insérer en BDD
    $contact->insertContact($c_nom, $c_email, $c_sujet, $c_message);
  }
}
// on utilise la méthode sendMail de la classe Contact.class.php
//$contact->sendEmail($c_sujet, $c_email, $c_message);

// on efface les valeurs du formulaires
unset($c_nom);
unset($c_email);
unset($c_sujet);
unset($c_message);
unset($c_contact);

// on créé une variable de succès
$success = 'Message envoyé !';


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/style1.css">
  <title>Contact</title>
  <!--affichage de l'heure!-->
  <SCRIPT LANGUAGE="JavaScript">
  function HeureCheckEJS()
  {
    krucial = new Date;
    heure = krucial.getHours();
    min = krucial.getMinutes();
    sec = krucial.getSeconds();
    jour = krucial.getDate();
    mois = krucial.getMonth()+1;
    annee = krucial.getFullYear();
    if (sec < 10)
    sec0 = "0";
    else
    sec0 = "";
    if (min < 10)
    min0 = "0";
    else
    min0 = "";
    if (heure < 10)
    heure0 = "0";
    else
    heure0 = "";
    DinaHeure = heure0 + heure + ":" + min0 + min + ":" + sec0 + sec;
    which = DinaHeure
    if (document.getElementById){
      document.getElementById("ejs_heure").innerHTML=which;
    }
    setTimeout("HeureCheckEJS()", 1000)
  }
  window.onload = HeureCheckEJS;
  </SCRIPT><!--fin affichage de l'heure!-->
</head>
<body>
  <!--page du menu!-->
  <div class="meny">

    <h2>Explorez</h2>
    <ul>
      <li><a href="page_accueil1.html">Accueil</a></li>
      <li><a href="profil1.html">Profil</a></li>
      <li><a href="formation_experience.html">Formations</a></li>
      <li><a href="competence1.html">Compétences</a></li>
      <li><a href="../../realisation.php">Réalisations</a></li>
      <li><a href="loisir.html">Loisirs</a></li>
      <li><a href="contact1.php">Contact</a></li>
      <div class="heure">
        <br /><p class="tt" ></p><br /><br />
        <div id="ejs_heure">Initialisation</div>
      </div>
      <!-- <li><a href="../../page-script-flash-menu.asp">menus flash</a></li> -->
      <br/><br/>
      <!-- <li><a href="../../page-generateur-CSS-bouton.asp">bouton CSS</a></li> -->
    </ul>
  </div>
  <div class="meny-arrow"></div>
  <div class="contents">
    <h1>Sandra HÉRISSON</h1>
    <h2>Contact</h2>
    <!-- BONUS EMAIL -->

    <?php if (isset($success)): ?>
      <div class="alert alert-success1" role="alert"><?= $success; ?></div>
    <?php endif ?>

    <!-- FIN BONUS EMAIL -->
    <form action="contact1.php" method="POST">
      <div id="form-main">
        <div id="form-div">
          <div class="form" id="form1">
            <!-- <form class="form" id="form1">  -->
            <label for="nom">Nom :</label>
            <span class="error"><?php if (isset($erreurnom)) echo $erreurnom; ?></span>
            <input class="form-control" type="text" name="c_nom" value="<?php if(isset($c_nom)) echo $c_nom; ?>">
          </div>
          <div class="form-group">
            <label for="email">Email :</label>
            <span class="error"><?php if (isset($erreuremail)) echo $erreuremail; ?></span>
            <input id="email" class="form-control" type="text" name="c_email" value="<?php if (isset($c_email)) echo $c_email; ?>">
          </div>
          <div class="form-group">
            <label for="sujet">Sujet :</label>
            <span class="error"><?php if (isset($erreursujet)) echo $erreursujet; ?></span>
            <input class="form-control" type="text" name="c_sujet" value="<?php if (isset($c_sujet)) echo $c_sujet; ?>">
          </div>
          <div class="form-group">
            <label for="message">Message :</label>
            <span class="error"><?php if (isset($erreurmessage)) echo $erreurmessage; ?></span>
            <textarea class="form-control" name="c_message" cols="30" rows="10"><?php if (isset($c_message)) echo $c_message; ?></textarea>
          </div>
          <div class="submit">
            <input type="submit" value="ENVOYER" id="button-blue"/>
            <div class="ease"></div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="js/meny.js"></script>
  <script>
  var meny = Meny.create({
    menuElement: document.querySelector( '.meny' ),
    contentsElement: document.querySelector( '.contents' ),
    // [optional] alignement du menu (top/right/bottom/left)
    position: Meny.getQuery().p || 'left',
    // [optional] hauteur du menu (pour la position top ou bottom)
    height: 200,
    // [optional] largeur du menu (pour la position left ou right)
    width: 260,
    // [optional] distance de d�clenchement du menu par rapport au menu
    threshold: 40,
    // [optional] utilisation des mouvement de la souris pour l'ouverture ou la fermeture
    mouse: true,
    // [optional] utilisation de l'approche
    touch: true
  });

  if( Meny.getQuery().u && Meny.getQuery().u.match( /^http/gi ) ) {
    var contents = document.querySelector( '.contents' );
    contents.style.padding = '0px';
    contents.innerHTML = '<div class="cover"></div><iframe src="'+ Meny.getQuery().u +'" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
  }
  </script>

</body>
</html>
