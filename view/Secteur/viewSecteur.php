<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<h1>Modifier un secteur</h1>
<br/><br/><form method="post" action="index.php?action=updateSecteur">
    <table>
        <input required type="text" name="id" value="<?= $secteur->getId() ?>" hidden>
        <tr><td>Libelle</td><td><input required type="text" name="libelle" value="<?= $secteur->getLibelle() ?>"></td></tr>
    </table>
    <input type="submit" name="modifer" value="Modifier">
</form>
<br/><br/><a href="index.php?action=viewSecteurs">Liste des secteurs</a>
</body>
</html>