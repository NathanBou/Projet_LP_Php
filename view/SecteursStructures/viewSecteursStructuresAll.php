<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?></title>
</head>
<body>
<table>
    <tr>
        <td>ID du secteursStructures</td>
        <td>ID de la structure</td>
        <td>ID du secteur</td>
    </tr>
    <?php
    foreach ($secteursStructuresAll as $secteursStructures) { ?>
        <tr>
            <td><?= $secteursStructures->getId(); ?></td>
            <td><a href="index.php?action=viewStructure&id=<?= $secteursStructures->getIdStructure(); ?>"><?= $secteursStructures->getIdStructure(); ?></a></td>
            <td><a href="index.php?action=viewSecteur&id=<?= $secteursStructures->getIdSecteur(); ?>"><?= $secteursStructures->getIdSecteur(); ?></a></td>
            <td>
                <form method="post" action="index.php?action=deleteSecteursStructures&id=<?= $secteursStructures->getId()?>">
                    <input type="submit" name="deleteSecteursStructures" value="Supprimer"/>
                </form>
            </td>
            <td>
                <form method="post" action="index.php?action=viewSecteursStructures&id=<?= $secteursStructures->getId() ?>">
                    <input type="submit" name="updateSecteursStructures" value="Modifier"/>
                </form>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
<br/><br/><form method="post" action="index.php?action=addSecteursStructures">
    <table>
        <tr><td>Id de la structure</td><td><input required type="number" name="id_structure"></td></tr>
        <tr><td>Id du secteur</td><td><input required type="number" name="id_secteur"></td></tr>
    </table>
    <input type="submit" name="add" value="Ajouter">
</form>
<br/><br/>
<a href="index.php?action=viewStructures">Liste des structures</a><br/>
<a href="index.php?action=viewSecteurs">Liste des secteurs</a>
</body>
</html>