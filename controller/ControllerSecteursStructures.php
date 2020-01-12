<?php


namespace mvc\Controller;

require_once('Controller.php');
require_once(__DIR__ . '/../model/managers/SecteursStructuresManager.php');

use mvc\model\entities\SecteursStructures;
use mvc\model\manager\SecteursStructuresManager;


class ControllerSecteursStructures extends Controller
{

    public function __construct()
    {
        $this->manager = new SecteursStructuresManager();
    }

    public function viewSecteursStructuresAll() : void
    {
        $title = "Liste des secteurs et des structures";
        $secteursStructuresAll = $this->findAll();

        require(__DIR__ . '/../view/SecteursStructures/viewSecteursStructuresAll.php');
    }

    public function viewSecteursStructures($id) : void
    {
        $title = "Informations du secteur et de la structure";
        $secteursStructures = $this->findById($id);

        require(__DIR__ . '/../view/SecteursStructures/viewSecteursStructures.php');
    }

    public function addSecteursStructures() : void
    {
        $secteursStructures = new SecteursStructures(null, $_POST["id_structure"], $_POST["id_secteur"]);
        $this->insert($secteursStructures);
        header("Location: index.php?action=viewSecteursStructuresAll");
    }

    public function deleteSecteursStructures($id) : void
    {
        $this->delete($id);
        header("Location: index.php?action=viewSecteursStructuresAll");
    }

    public function updateSecteursStructures() : void
    {
        $secteursStructures = new SecteursStructures($_POST["id"], $_POST["id_structure"], $_POST["id_secteur"]);
        $this->update($secteursStructures);
        header("Location: index.php?action=viewSecteursStructuresAll");
    }

}