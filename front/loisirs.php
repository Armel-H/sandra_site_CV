<?php require('connexion.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Press+Start+2P" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style1.css">
        <title>loisirs</title>
        <!--affichage de l'heure!-->
        <?php
        $resultat = $bdd->query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
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
        </SCRIPT><!--fin affichage de l'heure!-->
    </head>
    <body>
        <!--page du menu!-->
        <?php include("inc/include_nav.php"); ?>
        <div class="meny-arrow"></div>
        <div class="contents">
            <!--            <h1>Sandra HÉRISSON</h1>-->
            <h1><?= $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom']; ?></h1>
            <h2>Mes loisirs</h2>
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
        <!--fin du menu!-->
        <div class="crawl">
            <div>
                <p>
                <h2>Le cinema</h2>
                J'aime le cinéma. mes goûts sont trés diverses et variés.
                La science-fiction, les thrillers, les films d'horreurs,
                les films historiques.
                </p>
                <p>
                <h2>La lecture</h2>
                les classiques(Balzac, Mautpassant, shakespear, Bazin).
                Les romans policiers(Agatha Christie, P.D James, Dashiell Hammet, Maxim Chattam, Conan Doyle, Edgar Poe ).
                Les romans d'aventures et d'anticipation( Jules Verne, Franck Herbert, Arthur C.Clark, JRR Tolkien).
                Les romans historiques sur la revolution, sur Napoléon Bonaparte 1er, et la seconde guerre mondiale et les camps de concentration.
                Les livres sur les différentes religions monothéistes et polythéistes.
                </p>
                <p>
                <h2>La musique</h2>
                j'aime la chanson française et étrangère( brassens, Les compagnons de la chanson, Fréhel, cabrel, Renaud, sardou, Kyo, Indochine, Deep purple, Pink Floyd, King Crimson, Polnareff, Coldplay, t-Rex etc....).
                </p>
                <p>
                <h2>Les voyages</h2>
                J'adore voyager. Je suis allée en Angleterre, en Allemagne, en Belgique, en Italie, en Espagne, au Portugal et j'ai pour projet le Canada et l'Autralie.
                </p>
                <p>
                <h2>Le dessin</h2>
                Le dessin est ma passion première.
                J'aime surtout dessiner la nature.
                </p>
            </div>
        </div>

    </body>
</html>
