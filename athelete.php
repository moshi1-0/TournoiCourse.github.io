<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc</title>
</head>
<body>
    <form action="athelete.php" method="post">
        <label for="">name:</label>
        <input type="text" name = name> <br>

        <label for="">firstname:</label>
        <input type="text" name = firstname> <br>

        <label for="">email:</label>
        <input type="text" name = email> <br>

        <label for="">password:</label>
        <input type="password" name = password> <br>

        <label for="">nationality:</label>
        <input type="text" name = nationality> <br>
      
        <input type="checkbox" id="100m" name="distance[]" value="100m">
        <label for="100m">100m</label>

        <input type="checkbox" id="400m" name="distance[]" value="400m">
        <label for="400m">400m</label>
        
        <input type="checkbox" id="1000m" name="distance[]" value="1000m">
        <label for="1000m">1000m</label> <br>

        <input type="checkbox" id="j" name="categorie" value="junior">
        <label for="j">junior</label>

        <input type="checkbox" id="m" name="categorie" value="major">
        <label for="m">major</label>
        
        <input type="checkbox" id="p" name="categorie" value="professionnel">
        <label for="p">professionnel</label> <br>


        <input type="submit" value="submit">
    </form>
    
</body>
</html>
<?php
    include("data.php");
    $name = "";
    $email = "";
    $password = "";
    $firstname = "";
    $nationality="";
    $distance= "";
    $categorie="";

 if(!empty($_POST["name"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) ) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $nationality = $_POST["nationality"];
    $password =password_hash( $_POST["password"], PASSWORD_DEFAULT);
    $firstname = $_POST["firstname"];
    $distance = isset($_POST["distance"]) ? implode(", ", $_POST["distance"]) : "";
    $categorie = isset($_POST["categorie"]) ? $_POST["categorie"] : "";
   
       // Préparer la requête pour éviter les injections SQL
       $stmt = $connexion->prepare("INSERT INTO athelete (name, firstname, email,nationality, password, distance, categorie) VALUES (?, ?, ?, ?,?,?,?)");
       $stmt->bind_param("sssssss", $name, $firstname, $email,$nationality, $password,$distance,$categorie);
   
       if ($stmt->execute()) {
           echo "Enregistrement réussi";
       } else {
           echo "Erreur : " . $stmt->error;
       }
   
       $stmt->close();
   } else {
       echo "Vous devez remplir tous les champs.";
   }

    mysqli_close($connexion);

?>
