<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Ruda:900,400' rel='stylesheet' type='text/css'>
	<title>Soundeo</title>
</head>
<body>

    <div class="container" id="header" >
        <br/>
        <img src="./Ressources/Image/logo.png" height="100" alt="Logo du site">
        <img src="./Ressources/Image/header.png" width="400">
		<p>Le site n°13374269 en matière de musique</p>

        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="?action=apropos">A propos</a></li>
                <li><a href="mailto:projetphp@iut.fr">Contact</a></li>
                <li><a href="?action=listeComplete&page=0">Liste complète</a></li>
                <?php   if(FrontControlleur::estConnecte() && FrontControlleur::estAdmin()){ ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Administration <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="?action=ajouterArtiste">Ajouter Artiste</a></li>
                            <li><a href="?action=ajouterAlbum">Ajouter Album</a></li>
                            <li><a href="?action=ajouterTitre">Ajouter Titre</a></li>
                            <li class="divider"></li>
                            <li><a href="?action=supprimerArtiste">Supprimer Artiste</a></li>
                            <li><a href="?action=supprimerAlbum">Supprimer Album</a></li>
                            <li><a href="?action=supprimerTitre">Supprimer Titre</a></li>
                        </ul>
                    </li>
                <?php   } ?>
            </ul>

            <?php if(!FrontControlleur::estConnecte()){ ?> 
                <form class="navbar-form navbar-right">
                    <button type="submit" class="btn btn-primary">Inscription</button>
                    <input type="hidden" name="action" value="inscription">   
                </form>
                <form class="navbar-form navbar-right" method="post">
                    <div class="form-group">
                        <input type="text" placeholder="Email" name="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" name="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                    <input type="hidden" name="action" value="connexion">   
                </form>
            <?php } else{ ?>
                <form class="navbar-form navbar-right" method="post">
                    <button type="submit" class="btn btn-primary">Déconnexion</button>
                    <input type="hidden" name="action" value="deconnexion">   
                </form>
            <?php } ?>
        </div>
    </div> 
    <div id="contenu" class="container">
    
    <div class="row">
        <div class="col-md-9">
                    <p>
                    <?php 
                        if(isset($Erreurs) && !empty($Erreurs)){
                            echo '<div style="color:red;">';
                            foreach ($Erreurs as $erreur) {
                                echo "Erreur : " . $erreur . "<br/>";
                            }
                            echo '</div>' ;
                        }
                     ?>
                    </p>
        </div> 
