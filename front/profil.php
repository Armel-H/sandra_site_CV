<?php require('connexion.php'); ?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">
        <!-- <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css'> -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> -->
        <link href="https://fonts.googleapis.com/css?family=|Gentium+Book+BasicSource+Serif+Pro" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style1.css">
        <title>Objectifs pro.</title>
        <?php
        $resultat = $pdoCV->query("SELECT * FROM t_utilisateur WHERE id_utilisateur = '1'");
        $ligne_utilisateur = $resultat->fetch(PDO::FETCH_ASSOC);
        ?>
        <!--script affichage de l'heure!-->
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
    </head>
    <body>
        <?php include("inc/include_nav.php"); ?>
        <div class="meny-arrow"></div>
        <div class="contents">
            <!--                <h1>Sandra HÉRISSON</h1>-->
            <h1><?= $ligne_utilisateur['prenom'] . ' ' . $ligne_utilisateur['nom']; ?></h1>
            <br>
            <h2>Mes objectifs pro.</h2>
            <br>
            <br>
            <div class="box">
                <br>
                </br>
                                                                                                                                        <center><div class="pres_idbloc2"><span class="pres_avatar"><!--<img src="" alt="" />!--><p>faisons connaissance</p></span><div class="pres_id1"><span class="pres_idtitle">IDENTITE</span><span class="pres_idcontent">
                                <span class="message_soustitre">Sandra  </span>
                                <span class="message_soustitre">Hérisson  </span>
                                <br>
                                <br>
                                <span class="message_soustitre">42 ans - </span>
                                <br>
                                <br>
                                <span class="message_soustitre">Intégratrice, développeuse web junior </span>
                                <br>
                                <br>
                                <span class="message_soustitre">Téléphone: 06 28 09 27 72 </span>



                            </span></div><div class="pres_id2"><span class="pres_idtitle">IMAGE</span><span class="pres_idcontent"><span class="soustitre"></span><img src="image/herisson.jpg" style="width:400px; height:270px;"/>

                                <span class="message_soustitre"></span>


                            </span></div><div class="pres_id3"><span class="pres_idtitle">RESEAUX</span><span class="pres_idcontent">

                                <a href="https://codepen.io/Sandra92/"><i class="fa fa-codepen fa-stack-2x"style="color:white;" aria-hidden="true"></i></a>
                                <br><br>

                                <a href="https://www.linkedin.com/in/sandra-herisson-887585145/"><i class="fa fa-linkedin fa-stack-2x"style="color:white"; aria-hidden="true"></i></a>
                                <br><br>
                                <a href="https://github.com/Armel-H"><i class="fa fa-github fa-stack-2x"style="color:white;" aria-hidden="#"></i></a>
                                <br><br>
                                <a href="https://www.facebook.com/profile.php?id=100018434137636"><i class="fa fa-facebook fa-stack-2x" aria-hidden="#" style="color:white;"></i></a>
                                <br><br>
                                <a href="contact.php"><i class="fa fa-envelope fa-stack-2x"style="color:white;" aria-hidden="true"></i></a>

                            </span></div><div class="pres_id4"><span class="pres_idtitle">OBJECTIFS</span><span class="pres_idcontent">
                                <span class="message_soustitre"> </span>

                                <span class="message_soustitre">Objectif(s)</span>
                                <p> Mes objectifs sont de parfaire mon expérience en effectuant un stage au sein d'une entreprise qui m'aidera à mettre en valeur mon potentiel.
                                    je voudrais ensuite trouver un emploi stable dans une société innovante et qui continuera à me former.</p>
                            </span></div><div class="pres_id5"><span class="pres_idtitle">IMAGE</span><span class="pres_idcontent">
                                <span class="message_soustitre"></span><img src="image/lettres-gothiques.jpg" style="width:400px;height:270px;"/>

                                <span class="message_soustitre"></span>

                            </span></center>
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
