<?php

class ControlleurAdmin
{

	function ajouterTitre(){
		$m = new Modele();
		$methode = "titre";
		$data = $m->getListeAlbum();
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			if(empty($_POST['Nom']))
				$Erreurs[] = "Merci d'ajouter un nom";
			if(empty($_POST['Duree']) || !Validation::estUnInt($_POST['Duree']) || (int) $_POST['Duree'] < 0)
				$Erreurs[] = "Merci d'ajouter une durée valide" ;
			$extension = strtolower(  substr(  strrchr($_FILES['fichier']['name'], '.')  ,1)  );
			if ($_FILES['fichier']['error'] > 0) 
				$Erreurs[] = "Erreur d'upload du fichier" . print_r($_FILES['fichier']['error']) ;
			if(empty($_FILES['fichier']) || $extension != "mp3")
				$Erreurs[] = "Merci d'ajouter un fichier valide" ;
			if(empty($Erreurs)){
				move_uploaded_file($_FILES['fichier']['tmp_name'], "/var/www/projet/Ressources/Musique/".$_FILES['fichier']['name']);
				rename("/var/www/projet/Ressources/Musique/".$_FILES['fichier']['name'],"/var/www/projet/Ressources/Musique/".(int) $m->getNextIDTitre() . ".mp3");
				$id = null;
				$nom = Validation::nettoyerString($_POST['Nom']);
				$duree = $_POST['Duree'];
				$albumId = $_POST['AlbumId'];
				$date = null;
				$m->ajouterTitre($id, $nom, $duree, $albumId, $date, 0, 0);


			}
		}
		require_once("./Vue/Ajout.php");
	}

	function ajouterArtiste(){
		$methode = "artiste";
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			if(empty($_POST['Nom']))
				$Erreurs[] = "Merci d'ajouter un nom";
			if(empty($_POST['Prenom']))
				$Erreurs[] = "Merci d'ajouter un prenom";
			if(empty($Erreurs)){
				$id = null;
				$nom = Validation::nettoyerString($_POST['Nom']);
				$prenom = Validation::nettoyerString($_POST['Prenom']);
				$m = new Modele();
				$m->ajouterArtiste($id, $nom, $prenom);
			}
		}
		require_once("./Vue/Ajout.php");

	}

	function ajouterAlbum(){
		$m = new Modele();

		$methode = "album";
		$data = $m->getListeArtiste();
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			if(empty($_POST['Nom']))
				$Erreurs[] = "Merci d'ajouter un nom";
			if(empty($_POST['Jaquette']))
				$Erreurs[] = "Merci d'ajouter une jaquette";
			if(empty($_POST['Annee']) || !Validation::estUnInt($_POST['Annee']))
				$Erreurs[] = "Merci d'ajouter une annee valide";
			if(empty($_POST['Compositeur']))
				$Erreurs[] = "Merci d'ajouter un compositeur";
			if(empty($_POST['Redacteur']))
				$Erreurs[] = "Merci d'ajouter un redacteur";
			if(empty($Erreurs)){
				$id = null;
				$nom = Validation::nettoyerString($_POST['Nom']);
				$jaquette = Validation::nettoyerString($_POST['Jaquette']);
				$annee = $_POST['Annee'];
				$artisteId = $_POST['ArtisteId'];
				$compositeur = Validation::nettoyerString($_POST['Compositeur']);
				$redacteur = Validation::nettoyerString($_POST['Redacteur']);
				$m->ajouterAlbum($id, $nom, $jaquette, $annee, $artisteId, $compositeur, $redacteur);
			}
		}
		require_once("./Vue/Ajout.php");

	}

	function supprimerTitre(){
		$m = new Modele();
		$methode = "titre";
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			$id = $_POST['TitreId'];
			$titres = $m->supprimerTitre($id);
		}
		$data = $m->getListeTitre();
		require_once("./Vue/Suppression.php");
	}

	function supprimerAlbum(){
		$m = new Modele();
		$methode = "album";
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			$id = $_POST['AlbumId'];
			$titres = $m->supprimerTitre($id);
		}
		$data = $m->getListeAlbum();
		require_once("./Vue/Suppression.php");
	}

	function supprimerArtiste(){		
		$m = new Modele();
		$methode = "artiste";
		if(isset($_POST['form']) && $_POST['form'] == 1)
		{
			$id = $_POST['ArtisteId'];
			$titres = $m->supprimerArtiste($id);
		}
		$data = $m->getListeArtiste();
		require_once("./Vue/Suppression.php");
	}
}
?>