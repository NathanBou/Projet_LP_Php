<?php


namespace mvc\Controller;

require_once('Controller.php');
require_once(__DIR__ . '/../model/managers/StructureManager.php');

use mvc\model\entities\Structure;
use mvc\model\manager\StructureManager;


class ControllerStructure extends Controller
{
    public function __construct()
    {
        $this->manager = new StructureManager();
    }

    public function viewStructures() : void
    {
        $title = "Liste des structures";
        $structures = $this->findAll();

        require(__DIR__ . '/../view/viewStructures.php');
    }

    public function viewStructure($id) : void
    {
        $title = "Informations de la structure";
        $structure = $this->findById($id);

        require(__DIR__ . '/../view/viewStructure.php');
    }

    public function addStructure() : void
    {
        $structure = new Structure(null, $_POST["nom"], $_POST["rue"], $_POST["cp"], $_POST["ville"], $_POST["estAsso"], $_POST["nb_donateurs"], $_POST["nb_actionnaires"]);
        $this->insert($structure);
        header("Location: index.php?action=viewStructures");
    }
}