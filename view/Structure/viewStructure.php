<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
Id : <?= $structure->getId() ?><br/>
Nom : <?= $structure->getNom() ?><br/>
Rue : <?= $structure->getRue() ?><br/>
Cp : <?= $structure->getCp() ?><br/>
Ville : <?= $structure->getVille() ?><br/>
<?php
if($structure->getEstAsso()==1){
?>
    Est une association : oui<br/>
<?php
} else {
?>
    Est une association : non<br/>
    <?php
}
if($structure->getNbDonateurs()!=null){
?>
    Nombre de donateurs : <?= $structure->getNbDonateurs() ?><br/>
<?php
} else {
?>
    Nombre d'actionnaires : <?= $structure->getNbActionnaires() ?><br/><br/>
<?php

}
?>
<br>
<form method="post" action="index.php?action=viewAddSecteursStructures&id=<?= $structure->getId()?>">
    <input type="submit" name="addSecteursStructures" value="Ajouter un secteur"/>
</form>
<form method="post" action="index.php?action=viewUpdateStructure&id=<?= $structure->getId()?>">
    <input type="submit" name="updateStructure" value="Modifier"/>
</form>
<form method="post" action="index.php?action=deleteStructure&id=<?= $structure->getId()?>">
    <input type="submit" name="deleteStructure" value="Supprimer"/>
</form>
<br>
<a href="index.php?action=viewStructures">Liste des structures</a><br/>
<a href="index.php?action=viewSecteurs">Liste des secteurs</a><br/>
<a href="index.php?action=viewSecteursStructuresAll">Liste des secteursStructures</a>
</body>
</html>