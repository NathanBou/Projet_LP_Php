<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<h1>Modifier une structure</h1>
<br/><br/><form method="post" action="index.php?action=updateStructure">
    <table>
        <input required type="text" name="id" value="<?= $structure->getId() ?>" hidden>
        <tr><td>Nom</td><td><input required type="text" name="nom" value="<?= $structure->getNom() ?>"></td></tr>
        <tr><td>Rue</td><td><input required type="text" name="rue" value="<?= $structure->getRue() ?>"></td></tr>
        <tr><td>Cp</td><td><input required type="text" name="cp" value="<?= $structure->getCp() ?>"></td></tr>
        <tr><td>Ville</td><td><input required type="text" name="ville" value="<?= $structure->getVille() ?>"></td></tr>
        <?php
        if( $structure->getEstAsso()==1){ ?>
            <tr><td>Est une association</td><td><input type="checkbox" name="estAsso" checked></td></tr>
        <?php } else { ?>
            <tr><td>Est une association</td><td><input type="checkbox" name="estAsso"></td></tr>
        <?php } ?>
        <tr><td>Nombre de donateurs</td><td><input type="number" name="nb_donateurs"  value="<?= $structure->getNbDonateurs() ?>"></td></tr>
        <tr><td>Nombre d'actionnaires</td><td><input type="number" name="nb_actionnaires" value="<?= $structure->getNbActionnaires() ?>"></td></tr>
    </table>
    <input type="submit" name="modifer" value="Modifier">
</form>
<br/><br/><a href="index.php?action=viewStructures">Liste des secteurs</a>
</body>
</html>