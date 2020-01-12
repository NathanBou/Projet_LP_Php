<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<table>
<tr>
    <td>ID du secteur</td>
    <td>Libelle du secteur</td>
</tr>
<?php
foreach ($secteurs as $secteur) { ?>
    <tr>
        <td><?= $secteur->getId(); ?></td>
        <td><?= $secteur->getLibelle(); ?></td>
        <td>
            <form method="post" action="index.php?action=deleteSecteur&id=<?= $secteur->getId()?>">
            <input type="submit" name="deleteSecteur" value="Supprimer"/>
            </form>
        </td>
        <td>
            <form method="post" action="index.php?action=viewSecteur&id=<?= $secteur->getId() ?>">
            <input type="submit" name="updateSecteur" value="Modifier"/>
            </form>
        </td>
    </tr>
    <?php
}
?>
</table>

<br/><br/><form method="post" action="index.php?action=addSecteur">
    <table>
        <tr><td>Nom</td><td><input required type="text" name="libelle"></td></tr>
    </table>
    <input type="submit" name="add" value="Ajouter">
</form>
<br/><br/>
<a href="index.php?action=viewStructures">Liste des structures</a><br/>
<a href="index.php?action=viewSecteurs">Liste des secteurs</a><br/>
<a href="index.php?action=viewSecteursStructuresAll">Liste des secteursStructures</a>
</body>
</html>