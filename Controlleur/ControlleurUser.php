<?php

class ControlleurUser
{
	
	function __construct()
	{
		# code...
	}

	function getTopTitre(){
		$m = new Modele();
		$titres = $m->getTopTitre();		
		require_once("./Vue/Accueil.php");
	}

	function getDetailsTitre(){
		$id = Validation::nettoyerString($_REQUEST['titreId']);
		
		if(!Validation::estUnInt($id)){
			$Erreurs[] = "Id de titre invalide";
			$titres = $m->getTopTitre();
			require_once("./Vue/Accueil.php");
		}

		$m = new Modele();
		$titre = $m->getDetailsTitre($id);	
		$commentaires = $m->getCommentaires($id);
		require_once("./Vue/Informations.php");
	}
        
    function getAPropos() {
        require_once("./Vue/APropos.php");
    }

    function ajouterCommentaire(){
		$m = new Modele();

        $auteur = Validation::nettoyerString($_POST['Auteur']);
        $titreId = Validation::nettoyerString($_POST['titreId']); 
        $text = Validation::nettoyerString($_POST['Commentaire']);
        
        if(strlen($auteur) < 3)
	        $Erreurs[] = "Vous devez spécifiez un nom d'au moins 3 caractères !";
	    if(strlen($text) < 3 )	    	
	        $Erreurs[] = "Le texte doit être d'au moins 2 caractères !";
        if(!Validation::estUnInt($titreId)){
	        $Erreurs[] = "Impossible de poster un commentaire sur un titre inexistant!";
			$titres = $m->getTopTitre();
			require_once("./Vue/Accueil.php");
        }
		if(empty($Erreurs)){
			$m->ajouterCommentaire($auteur,$titreId,$text);
		}
		$titre = $m->getDetailsTitre($titreId);
		$commentaires = $m->getCommentaires($titreId);
		require_once("./Vue/Informations.php");
	}

	public function connexion()
	{
		$m = new Modele();
		$email = Validation::nettoyerString($_POST['Email']);
		$pass = Validation::nettoyerString($_POST['Password']);

		if(Validation::estUnMail($email))
		{
			$auth = $m->estInscrit($email, sha1($pass));
			if($auth == false || $auth == null){			
	            $Erreurs[] = "Informations d'authentification invalide !";
			}
			else
			{
				$_SESSION['typeUser'] = $auth;
			}		
		}
		else {
			$Erreurs[] = "Ceci n'est pas un mail valide";
		}

		$titres = $m->getTopTitre();
		require_once("./Vue/Accueil.php");
	}

	public function deconnexion()
	{
		session_unset();
		session_destroy();
		$this->getTopTitre();
	}

	public function listeComplete()
	{
		$page = $_REQUEST['page'];
		if(empty($page) || !Validation::estUnInt($page))
			$page = 0 ;
		$m = new Modele();
		$nbPages = $m->getNbPages();
		$liste = $m->listeComplete($page);

		require_once("./Vue/Liste.php");
	}
	
	public function ajouterAvisF()
	{
		$m = new Modele();
        $titreId = Validation::nettoyerString($_GET['titreId']); 

        if(isset($_COOKIE['vote_' . $titreId]))
        	$Erreurs[] = "Vous avez déjà voté !";
        if(!Validation::estUnInt($titreId)){
	        $Erreurs[] = "Impossible d'émettre un avis sur un titre inexistant!";
			$titres = $m->getTopTitre();
			require_once("./Vue/Accueil.php");
        }
		if(empty($Erreurs)){
			$m->ajouterAvisF($titreId);
			setcookie ("vote_" . $titreId , "1", time() + 10*365*24*3600);
		}
		$titre = $m->getDetailsTitre($titreId);
		$commentaires = $m->getCommentaires($titreId);
		require_once("./Vue/Informations.php");
	}

	public function ajouterAvisD()
	{
		$m = new Modele();
        $titreId = Validation::nettoyerString($_GET['titreId']); 

        if(isset($_COOKIE['vote_' . $titreId]))
        	$Erreurs[] = "Vous avez déjà voté !";
        if(!Validation::estUnInt($titreId)){
	        $Erreurs[] = "Impossible d'émettre un avis sur un titre inexistant!";
			$titres = $m->getTopTitre();
			require_once("./Vue/Accueil.php");
        }
		if(empty($Erreurs)){
			$m->ajouterAvisD($titreId);
			setcookie ("vote_" . $titreId , "1", time() + 10*365*24*3600);
		}
		$titre = $m->getDetailsTitre($titreId);
		$commentaires = $m->getCommentaires($titreId);
		require_once("./Vue/Informations.php");
	}

	public function inscription()
	{
		$m = new Modele();
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			$email = Validation::nettoyerString($_POST['email']);
			$pass = Validation::nettoyerString($_POST['password']);
			$pass2 = Validation::nettoyerString($_POST['password2']);

			if(!Validation::estUnMail($email))
			{
				$Erreurs[] = "Ceci n'est pas un mail valide";
			}	
			if(strlen($pass) < 6)
			{
				$Erreurs[] = "Minimum 6 caractère pour le mot de passe !";
			}
			if($pass != $pass2)
			{
				$Erreurs[] = "Les deux champ mot de passe sont différents";
			}
			if(empty($Erreurs)){
				$m->inscription($email, sha1($pass));
				$titres = $m->getTopTitre();
				require_once("./Vue/Accueil.php");
			}
		}
		require_once("./Vue/Inscription.php");
	}

}



?>