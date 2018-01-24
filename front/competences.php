<?php require('connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <!-- <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet"> -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style1.css">
        <title>compétences</title>
        <!--script pour afficher l'heure en js!-->
        <?php
        $resultat = $pdoCV->query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
        ?>
        <SCRIPT LANGUAGE="JavaScript">
            function HeureCheckEJS()
            {
                krucial = new Date;
                heure = krucial.getHours();
                min = krucial.getMinutes();
                sec = krucial.getSeconds();
                jour = krucial.getDate();
                mois = krucial.getMonth() + 1;
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
                which = DinaHeure;
                if (document.getElementById) {
                    document.getElementById("ejs_heure").innerHTML = which;
                }
                setTimeout("HeureCheckEJS()", 1000);
            }
            window.onload = HeureCheckEJS;
        </SCRIPT>
        <!--script de la page de base!-->
    </head>
    <body>
        <?php include("inc/include_nav.php"); ?>
        <div class="meny-arrow"></div>
        <div class="contents">
            <!--            <h1>Sandra HÉRISSON</h1>-->
            <h1><?= $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom']; ?></h1>
            <h2>Mes compétences Web</h2>
            <p style="color:yellow;">
                Html/ CSS
                -> JavaScript/jquery
                -> WordPress
                -> Bootstrap
                <br>
                SQL
                -> PHP
                -> Silex(notions)
                -> Ajax(notions)

            </p>
        </div>
        <script src="js/meny.js"></script>
        <script>
    var meny = Meny.create({
        menuElement: document.querySelector('.meny'),
        contentsElement: document.querySelector('.contents'),
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

    if (Meny.getQuery().u && Meny.getQuery().u.match(/^http/gi)) {
        var contents = document.querySelector('.contents');
        contents.style.padding = '0px';
        contents.innerHTML = '<div class="cover"></div><iframe src="' + Meny.getQuery().u + '" style="width: 100%; height: 100%; border: 0; position: absolute;"></iframe>';
    }
        </script>
        <!--cube!-->
        <div class="wrap">
            <div class="cube">
                <div class="front">
                    HTML/CSS
                </div>
                <div class="back">
                    Silex
                    <br>
                    (notions)
                </div>
                <div class="top">
                    JavaScript/Jquery
                </div>
                <div class="bottom">
                    Ajax
                    notions
                </div>
                <div class="left">
                    PHP
                </div>
                <div class="right">
                    SQL
                </div>
                <div class="right-side">
                    Bootstrap
                    <br>
                    WordPress
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/index2.js"></script>
    </body>
</html>
