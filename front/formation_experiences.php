<?php require('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Risque" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style1.css">
        <title>Formations & Compétences</title>
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
            <h2>Expériences et Formations</h2>
            <style id="look">
            </style>
            <button id="turn-right">Next Page</button>
            <button id="turn-left">Previous Page</button>
            <!-- <button id="turn-left">Next Page</button>
            <button id="turn-right">Previous Page</button> -->
            <div id="book">
                <div class="flip">
                    <div class="page frnt">
                        <div class="bg">
                        </div>
                        <p><h4>Mes EXPERIENCES ET MES FORMATIONS
                        </h4></p>
                    </div>
                    <div class="page bck">
                        <div class="bg">
                        </div>
                        <p><br>Mes formations
                            <br><br>
                            2017=> Certification de développeur et intégrateur Web
                            <br>
                            Webforce3 et LepôleS (formation labellisée Grande Ecole du Numérique- Techniques de développement Web et  mobile)
                            <br>
                            Villeneuve-La-garenne
                            <br><br>
                            1997=> B.A.F.A (brevet d'aptitudes aux fonctions d'animateur)
                            <br>
                            Nevers
                            <br><br>
                            1996=> Certification d'Hôtesse d'accueil bilingue
                            <br>
                            Expressions et Communications La-Plaine-Saint-Denis
                        </p>
                    </div>
                </div>
                <div class="flip">
                    <div class="page frnt">
                        <div class="bg">
                        </div>
                        <p><br>
                            <br><br>
                            1995=> BAC Sciences médico-Sociales
                            <br>
                            Lycée rené Auffray Clichy
                            <br><br>
                            1993=> B.E.P des Carrières Sanitaires et médico-Sociales
                            <br>
                            Lycée René Auffray Clichy
                            <br><br>
                            1992=> Brevet National de Secourisme
                            <br>
                            Les Pompiers de Paris et Lycée René Auffray Clichy
                        </p>
                    </div>
                    <div class="page bck">
                        <div class="bg">
                        </div>
                        <p><br>Mes expériences
                            <br><br>
                            juin 2017=> Développeur Intégrateur Web
                            <br>
                            LepôleS Villeneuve-la-Garenne
                            <br><br>
                            2011/2014=> Agent d'entretient
                            <br>
                            Houservices Levallois
                            <br><br>
                            2010/2011=> Gardienne d'immeuble
                            <br>
                            Arthur & Tiffen Paris
                            <br><br>
                            2006/2010=> Agent administratif
                            <br>
                            Lycée Honoré de Balzac Paris
                            <br><br>
                            2005/2006=> Aide à domicile
                            <br>
                            Clichy
                            <br><br>
                            1995=> Assistante de vie aux familles
                            <br>
                            Familles et Cités Paris
                            <br><br>
                            1993=> Aide-soignante stagiaire en gériatrie
                            <br>
                            Maisons de retraites Garigliano et la Cité des Fleurs Neuilly
                            <br><br>
                        </p>
                    </div>
                </div>
                <div class="flip">
                    <div class="page frnt">
                        <div class="bg">
                        </div>
                        <p><br>
                            <br><br>
                            1992/1993=> Animatrice de Centre de loisirs
                            <br>
                            Ecole Condorcet Clichy
                            <br><br>
                            1992=> Auxilliaire de puériculture stagiaire
                            <br>
                            Crêche de Zodiaque Courbevoie
                        </p>
                    </div>
                    <div class="page bck">
                        <div class="bg">
                        </div>
                        <p>
                            <br><br>
                            <a href="CV_sandra_herisson.pdf" target="_blank">Merci de télécharger mon CV</a>
                        </p>
                    </div>
                </div>
            </div>
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
        <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="js/index2.js"></script>
    </body>
</html>
