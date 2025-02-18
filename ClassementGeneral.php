<?php
require 'db.php';
$classement = $pdo->query("SELECT participants.nom, participants.categorie, MIN(resultats.temps) AS meilleur_temps FROM resultats 
                            JOIN participants ON resultats.participant_id = participants.id 
                            GROUP BY participants.nom, participants.categorie ORDER BY meilleur_temps ASC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classement</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Classement Général</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Meilleur Temps</th>
        </tr>
        <?php foreach ($classement as $row): ?>
            <tr>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['categorie'] ?></td>
                <td><?= $row['meilleur_temps'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
