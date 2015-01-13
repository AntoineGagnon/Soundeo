<?php

/**
 * 	
 */
class FrontControlleur {

    function __construct() {


        try {
        	session_start();
            $Erreurs = array();
            $actionAdmin = array('ajouterTitre', 'ajouterArtiste', 'ajouterAlbum', 'supprimerTitre', 'supprimerArtiste', 'supprimerAlbum');
            $actionModo = array('supprimerCommentaire');

            if (!isset($_REQUEST['action']) || empty($_REQUEST['action']))
                $action = NULL;
            else
                $action = $_REQUEST['action'];

            if($this->estAdmin() && in_array($action, $actionAdmin))
            {
                switch ($action) {
                    case 'ajouterTitre':
                        $c = new ControlleurAdmin();
                        $c->ajouterTitre();
                        break;
                    case 'ajouterArtiste':
                        $c = new ControlleurAdmin();
                        $c->ajouterArtiste();
                        break;
                    case 'ajouterAlbum':
                        $c = new ControlleurAdmin();
                        $c->ajouterAlbum();
                        break;
                    case 'supprimerTitre':
                        $c = new ControlleurAdmin();
                        $c->supprimerTitre();
                        break;
                    case 'supprimerArtiste':
                        $c = new ControlleurAdmin();
                        $c->supprimerArtiste();
                        break;
                    case 'supprimerAlbum':
                        $c = new ControlleurAdmin();
                        $c->supprimerAlbum();
                        break;
                }
            }
            if ($this->estModo() && in_array($action, $actionModo)) {

                switch ($action) {                
                    case 'supprimerCommentaire':
                        $c = new ControlleurModerateur();
                        $c->supprimerCommentaire();
                        break;
                }

            }
            if(!in_array($action, $actionAdmin) && !in_array($action, $actionModo)){
                switch ($action) {
                    case 'detail':
        	            $c = new ControlleurUser();
        	            $c->getDetailsTitre();
        	            break;
                    case 'apropos':
              	      $c = new ControlleurUser();
        	            $c->getAPropos();
        	            break;
                    case 'ajouterCommentaire':
                        $c = new ControlleurUser();
                        $c->ajouterCommentaire();
                        break;
                    case 'connexion':
                        $c = new ControlleurUser();
                        $c->connexion();
                        break;
                    case 'deconnexion':
                        $c = new ControlleurUser();
                        $c->deconnexion();
                        break;
                    case 'listeComplete':
                        $c = new ControlleurUser();
                        $c->listeComplete();
                        break;
                    case 'ajouterAvisF':
                        $c = new ControlleurUser();
                        $c->ajouterAvisF();
                        break;
                    case 'ajouterAvisD':
                        $c = new ControlleurUser();
                        $c->ajouterAvisD();
                        break;
                    case 'inscription':
                        $c = new ControlleurUser();
                        $c->inscription();
                        break;
                    case NULL :
                    default:
                        $c = new ControlleurUser();
                        $c->getTopTitre();
                        break;
                }
            }
            
        } catch (PDOException $e){
            $Erreurs[] = "Erreur PDO innatendu !";
            $c = new ControlleurUser();
            $c->getTopTitre();
        }
        catch (Exception $e2)
        {
            $Erreurs[] = "Erreur innatendu !";
            $c = new ControlleurUser();
            $c->getTopTitre();
        }
    }

    public function estAdmin()
    {
        if(isset($_SESSION['typeUser']) && !empty($_SESSION['typeUser']) && Validation::estUnInt($_SESSION['typeUser']) && $_SESSION['typeUser'] == 9)
            return true;
        return false;
    }

    public function estModo()
    {
        if(isset($_SESSION['typeUser']) && !empty($_SESSION['typeUser']) && Validation::estUnInt($_SESSION['typeUser']))
            return $_SESSION['typeUser'] >= 5;
        return false;
    }

    public function estConnecte()
    {
        if(isset($_SESSION['typeUser']) && !empty($_SESSION['typeUser']))
            return true;
        return false;
    }

}

?>