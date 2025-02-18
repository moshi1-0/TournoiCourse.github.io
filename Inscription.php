<?php
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $age = $_POST['age'];
    $categorie = $_POST['categorie'];
    $pays = $_POST['pays'];
    
    $stmt = $pdo->prepare("INSERT INTO participants (nom, age, categorie, pays) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nom, $age, $categorie, $pays])) {
        echo "Inscription réussie!";
    } else {
        echo "Erreur lors de l'inscription.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Inscription au Tournoi</h1>
    <form action="Inscription.php" method="POST">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required>
        
        <label for="age">Âge :</label>
        <input type="number" id="age" name="age" required>
        
        <label for="categorie">Catégorie :</label>
        <select id="categorie" name="categorie" required>
            <option value="Junior">Junior</option>
            <option value="Senior">Senior</option>
            <option value="Vétéran">Vétéran</option>
        </select>
        
        <label for="pays">Pays :</label>
        <input type="text" id="pays" name="pays" required>
        
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
