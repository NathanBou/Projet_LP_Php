<?php

require_once("./controller/ControllerStructure.php");
require_once("./controller/ControllerSecteur.php");
use mvc\controller\ControllerStructure;
use mvc\controller\ControllerSecteur;

try {
    if (isset($_GET["action"])) {
        if (stripos($_GET["action"], "structure")) {
            $controler = new ControllerStructure();
            switch ($_GET["action"]) {
                case "viewStructure":
                    if (isset($_GET["id"]) && $_GET["id"] > 0) {
                        $controler->viewStructure($_GET["id"]);
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "viewStructures":
                    $controler->viewStructures();
                    break;
                case "addStructure":
                    if (isset($_POST["nom"], $_POST["rue"], $_POST["cp"], $_POST["ville"], $_POST["estAsso"], $_POST["nb_donateurs"], $_POST["nb_actionnaires"])) {
                        $controler->addStructure();
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                default :
                    $error = "Erreur : action non reconnue<br/>";
                    break;
            }
        } elseif (stripos($_GET["action"], "secteur")) {
            $controler = new ControllerSecteur();
            switch ($_GET["action"]) {
                case "viewSecteur":
                    if (isset($_GET["id"]) && $_GET["id"] > 0) {
                        $controler->viewSecteur($_GET["id"]);
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "viewSecteurs":
                    $controler->viewSecteurs();
                    break;
                case "addSecteur":
                    if (isset($_POST["libelle"])) {
                        $controler->addSecteur();
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                default :
                    $error = "Erreur : action non reconnue<br/>";
                    break;
            }
        } else {
            $error = "Erreur : action non reconnue<br/>";
        }
    } else {
        ?>
        <a href="index.php?action=viewStructures">Liste des structures</a><br/>
        <a href="index.php?action=viewSecteurs">Liste des secteurs</a>
        <?php
    }
}
catch (Exception $ex) {
    $error="Error ".$ex->getCode()." : ".$ex->getMessage()."<br/>".str_replace("\n","<br/>",$ex->getTraceAsString());
}
if (isset($error)) {
    require(__DIR__.'/view/error.php');
}
?>