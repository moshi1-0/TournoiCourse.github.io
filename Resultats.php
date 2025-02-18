-- Page PHP : Résultats
<?php
require 'db.php';
$results = $pdo->query("SELECT participants.nom, participants.categorie, courses.nom AS course, resultats.temps, resultats.classement FROM resultats 
                        JOIN participants ON resultats.participant_id = participants.id 
                        JOIN courses ON resultats.course_id = courses.id ORDER BY resultats.classement ASC");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Résultats des Courses</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Catégorie</th>
            <th>Course</th>
            <th>Temps</th>
            <th>Classement</th>
        </tr>
        <?php foreach ($results as $row): ?>
            <tr>
                <td><?= $row['nom'] ?></td>
                <td><?= $row['categorie'] ?></td>
                <td><?= $row['course'] ?></td>
                <td><?= $row['temps'] ?></td>
                <td><?= $row['classement'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
