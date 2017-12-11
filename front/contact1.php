<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
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
      <li><a href="formation.html">Formations</a></li>
      <li><a href="../../experience.php">Experiences</a></li>
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
    <div class="bg10">
  		<form action="#" method="post">
  			<input type="text" class="cont" id="name" name="firstname" placeholder="Name" required><span class="fa fa-user user"></span> <br/>

  			<input type="text" id="email" class="cont" name="email" placeholder="Email" required>
        <span class="fa fa-envelope-o email_icon"></span>
        <br/>

  			<input type="text" id="subjecting" class="cont" name="subject" placeholder="Subject" required> <span class="fa fa fa-pencil subject"></span> <br/>

  			<textarea rows="10" cols="40" id="boxing"  class="cont" placeholder="Message"></textarea> <span class="fa fa-comment-o comment"></span><br/>

  			<input type="submit" value="Send a message" id="submit_button">
  		</form>
  	</div>

  </div>
    <h1>Sandra HÉRISSON</h1>
    <h2>Contact</h2>
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
