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
<br/><br/><a href="index.php?action=viewStructures">Liste des structures</a>
</body>
</html>