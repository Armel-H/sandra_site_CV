<?php require('front/connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="front/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="front/css/style1.css">
        <title>Accueil</title>
        <!-- Affichage de l'heure!-->
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
        <!--fin affichage de l'heure!-->
    </head>

    <!--menu !-->
    <div class="meny">
        <h2>Explorez</h2>

        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="front/profil.php">Objectifs Pro.</a></li>
            <li><a href="front/formation_experiences.php">Expériences</a></li>
            <li><a href="front/competences.php">Compétences</a></li>
            <li><a href="front/realisations.php">Réalisations</a></li>
            <li><a href="front/loisirs.php">Loisirs</a></li>
            <li><a href="front/contact.php">Contactez-moi</a></li>
            <br/><br/>
            <div class="heure">
                <br /><p class="tt" ></p><br /><br />
                <div id="ejs_heure">Initialisation</div>
            </div>
        </ul>
    </div>
    <div class="meny-arrow"></div>
    <div class="contents">
        <!--<h1>Sandra HÉRISSON</h1>-->
        <h1><?= $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom']; ?></h1>
        <br><br>
        <h1><marquee direction="left">Intégratrice, développeuse web junior </marquee><h1>

                <h2><marquee direction="right">Voici mon portfolio </marquee></h2>
                <br><br>
                <h2><marquee direction="left">EN RECHERCHE DE STAGE </marquee></h2>
                </div>
                <script src="front/js/meny.js"></script>
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

<?php include("inc/include_footer.php"); ?>
                </html>
