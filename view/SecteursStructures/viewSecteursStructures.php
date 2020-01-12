<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<h1>Modifier un secteur</h1>
<br/><br/><form method="post" action="index.php?action=updateSecteursStructures">
    <table>
        <input required type="text" name="id" value="<?= $secteursStructures->getId() ?>" hidden>
        <tr><td>Id de la structure</td><td><input required type="text" name="id_structure" value="<?= $secteursStructures->getIdStructure() ?>"></td></tr>
        <tr><td>Id du secteur</td><td><input required type="text" name="id_secteur" value="<?= $secteursStructures->getIdSecteur() ?>"></td></tr>
    </table>
    <input type="submit" name="modifer" value="Modifier">
</form>
<br/><br/><a href="index.php?action=viewSecteursStructuresAll">Liste des secteursStructures</a>
</body>
</html>