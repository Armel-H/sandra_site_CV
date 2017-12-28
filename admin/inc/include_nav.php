<nav class="couleur-nav navbar navbar-inverse"><!--Navbar boostrap-->
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="<?= $ligne_utilisateur['pseudo']; ?>"><span class="glyphicon glyphicon-tree-deciduous" aria-hidden="true"></span></a> -->
            <a class="navbar-brand" href="index.php"><?= $ligne_utilisateur['pseudo']; ?></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <!--<li class="active"><a href="utilisateur.php">Profil<span class="sr-only">(current)</span></a></li>!-->
                <li><a href="#">Lien</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Parcours<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="experience.php">Expériences</a></li>
                        <li><a href="realisation.php">Réalisations</a></li>
                        <li><a href="formation.php">Formations</a></li>
                        <li><a href="competence1.php">Compétences</a></li>
                        <li><a href="loisirs.php">Loisirs</a></li>
                        <!--<li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">One more separated link</a></li>!-->
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <!--<li><a href="#">Lien</a></li>!-->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Déconnexion <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <!--<li><a href="loisirs.php">Loisir</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>!-->
                        <li><a href="authentification.php?quitter=oui">Deconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
