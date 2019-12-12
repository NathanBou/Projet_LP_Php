<?php


namespace mvc\Controller;

require_once('Controller.php');
require_once(__DIR__ . '/../model/managers/SecteurManager.php');

use mvc\model\entities\Secteur;
use mvc\model\manager\SecteurManager;



class ControllerSecteur extends Controller
{
    public function __construct()
    {
        $this->manager = new SecteurManager();
    }

    public function viewSecteurs() : void
    {
        $title = "Liste des secteurs";
        $secteurs = $this->findAll();

        require(__DIR__ . '/../view/viewSecteurs.php');
    }

    public function viewSecteur($id) : void
    {
        $title = "Informations du secteur";
        $secteur = $this->findById($id);

        require(__DIR__ . '/../view/viewSecteur.php');
    }

    public function addSecteur() : void
    {
        $secteur = new Secteur(null, $_POST["libelle"]);
        $this->insert($secteur);
        header("Location: index.php?action=viewSecteurs");
    }

}