<?php

require_once("./controller/ControllerStructure.php");
require_once("./controller/ControllerSecteur.php");
require_once("./controller/ControllerSecteursStructures.php");
use mvc\controller\ControllerStructure;
use mvc\controller\ControllerSecteur;
use mvc\controller\ControllerSecteursStructures;

try {
    $base = new PDO('mysql:host=localhost; dbname=projet_lp', 'root', 'poiuy');
}
catch(exception $e) {
    die('Erreur '.$e->getMessage());
}

try {
    if (isset($_GET["action"])) {
        if (stripos($_GET["action"], "secteursStructures")) {
            $controler = new ControllerSecteursStructures();
            switch ($_GET["action"]) {
                case "viewSecteursStructures":
                    if (isset($_GET["id"]) && $_GET["id"] > 0) {
                        $controler->viewSecteursStructures($_GET["id"]);
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "viewSecteursStructuresAll":
                    $controler->viewSecteursStructuresAll();
                    break;
                case "addSecteursStructures":
                    if(isset($_POST["id_structure"], $_POST["id_secteur"])) {
                        $stm = $base->query('select * from structure where id="'.$_POST["id_structure"].'"');
                        $structure = $stm->fetch();
                        $stmt = $base->query('select * from secteur where id="'.$_POST["id_secteur"].'"');
                        $secteur = $stmt->fetch();
                        if($structure!=null && $secteur!=null){
                            $st = $base->query('select * from secteurs_structures where id_structure="'.$_POST["id_structure"].'" and id_secteur="'.$_POST["id_secteur"].'"');
                            $secteursStructures = $st->fetch();
                            if($secteursStructures==null) {
                                $controler->addSecteursStructures();
                            } else {
                                $error = "Combinaison déjà existante<br/>";
                            }
                        } else {
                            $error = "Le secteur ou la structure n'existe pas<br/>";
                        }
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                case "deleteSecteursStructures":
                    if(isset($_GET["id"]) && $_GET["id"] > 0) {
                        $controler->deleteSecteursStructures($_GET["id"]);
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "updateSecteursStructures":
                    if(isset($_POST["id_structure"], $_POST["id_secteur"])) {
                        $stm = $base->query('select * from structure where id="'.$_POST["id_structure"].'"');
                        $structure = $stm->fetch();
                        $stmt = $base->query('select * from secteur where id="'.$_POST["id_secteur"].'"');
                        $secteur = $stmt->fetch();
                        if($structure!=null && $secteur!=null){
                            $st = $base->query('select * from secteurs_structures where id_structure="'.$_POST["id_structure"].'" and id_secteur="'.$_POST["id_secteur"].'"');
                            $secteursStructures = $st->fetch();
                            if($secteursStructures==null) {
                                $controler->updateSecteursStructures();
                            } else {
                                $error = "Combinaison déjà existante<br/>";
                            }
                        } else {
                            $error = "Le secteur ou la structure n'existe pas<br/>";
                        }
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                default :
                    $error = "Erreur : action secteursStructures non reconnue<br/>";
                    break;
            }
        } else if (stripos($_GET["action"], "structure")) {
            $controler = new ControllerStructure();
            switch ($_GET["action"]) {
                case "viewStructure":
                    if (isset($_GET["id"]) && $_GET["id"] > 0) {
                        $controler->viewStructure($_GET["id"]);
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "viewUpdateStructure":
                    if (isset($_GET["id"]) && $_GET["id"] > 0) {
                        $controler->viewUpdateStructure($_GET["id"]);
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "viewStructures":
                    $controler->viewStructures();
                    break;
                case "addStructure":
                    if (isset($_POST["nom"], $_POST["rue"], $_POST["cp"], $_POST["ville"], $_POST["nb_donateurs"], $_POST["nb_actionnaires"])) {
                        if($_POST["nb_actionnaires"]==null && $_POST["nb_donateurs"]==null) {
                            $error = "Paramètres vides<br/>";
                        } else if(isset($_POST["estAsso"]) && $_POST["nb_donateurs"]==null){
                            $error = "Le nombre de donateurs est null<br/>";
                        } else if(!isset($_POST["estAsso"]) && $_POST["nb_actionnaires"]==null){
                            $error = "Le nombre d'actionnaires est null<br/>";
                        } else {
                            if(isset($_POST["estAsso"])){
                                $_POST["estAsso"]=1;
                                $_POST["nb_actionnaires"]=null;
                            } else {
                                $_POST["estAsso"]=0;
                                $_POST["nb_donateurs"]=null;
                            }
                            $controler->addStructure();
                        }
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                case "deleteStructure":
                    if(isset($_GET["id"]) && $_GET["id"] > 0) {
                        $st = $base->query('select * from secteurs_structures where id_structure="'.$_GET["id"].'"');
                        $secteursStructures = $st->fetch();
                        if($secteursStructures==null) {
                            $controler->deleteStructure($_GET["id"]);
                        } else {
                            $error = "La structure est reliée à un secteur<br/>";
                        }
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "updateStructure":
                    if (isset($_POST["nom"], $_POST["rue"], $_POST["cp"], $_POST["ville"], $_POST["nb_donateurs"], $_POST["nb_actionnaires"])) {
                        if($_POST["nb_actionnaires"]==null && $_POST["nb_donateurs"]==null) {
                            $error = "Paramètres vides<br/>";
                        } else if(isset($_POST["estAsso"]) && $_POST["nb_donateurs"]==null){
                            $error = "Le nombre de donateurs est null<br/>";
                        } else if(!isset($_POST["estAsso"]) && $_POST["nb_actionnaires"]==null){
                            $error = "Le nombre d'actionnaires est null<br/>";
                        } else {
                            if (isset($_POST["estAsso"])) {
                                $_POST["estAsso"] = 1;
                                $_POST["nb_actionnaires"] = null;
                            } else {
                                $_POST["estAsso"] = 0;
                                $_POST["nb_donateurs"] = null;
                            }
                            $controler->updateStructure();
                        }
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                default :
                    $error = "Erreur : action structure non reconnue<br/>";
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
                case "deleteSecteur":
                    if(isset($_GET["id"]) && $_GET["id"] > 0) {
                        $st = $base->query('select * from secteurs_structures where id_secteur="'.$_GET["id"].'"');
                        $secteursStructures = $st->fetch();
                        if($secteursStructures==null) {
                            $controler->deleteSecteur($_GET["id"]);
                        } else {
                            $error = "La structure est reliée à un secteur<br/>";
                        }
                    } else {
                        $error = "Erreur : mauvais identifiant<br/>";
                    }
                    break;
                case "updateSecteur":
                    if(isset($_POST["libelle"]) && isset($_POST["id"])) {
                        $controler->updateSecteur();
                    } else {
                        $error = "Erreur de paramètres<br/>";
                    }
                    break;
                default :
                    $error = "Erreur : action secteur non reconnue<br/>";
                    break;
            }
        } else {
            $error = "Erreur : action non reconnue<br/>";
        }
    } else {
        ?>
        <a href="index.php?action=viewStructures">Liste des structures</a><br/>
        <a href="index.php?action=viewSecteurs">Liste des secteurs</a><br/>
        <a href="index.php?action=viewSecteursStructuresAll">Liste des secteursStructures</a>
        <?php
    }
    $base = null;
}
catch (Exception $ex) {
    $error="Error ".$ex->getCode()." : ".$ex->getMessage()."<br/>".str_replace("\n","<br/>",$ex->getTraceAsString());
}
if (isset($error)) {
    require(__DIR__.'/view/error.php');
}
?>