<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="user.php" method="post">
        <label for="">name:</label>
        <input type="text" name = name> <br>

        <label for="">firstname:</label>
        <input type="text" name = firstname> <br>

       

        <label for="">email:</label>
        <input type="text" name = email> <br>

        <label for="">password:</label>
        <input type="password" name = password> <br>

        <input type="submit" value="log in">
    </form>
    
</body>
</html>
<?php
    include("data.php");
    $name = "";
    $email = "";
    $password = "";
    $firstname = "";

 if(!empty($_POST["name"]) && !empty($_POST["firstname"]) && !empty($_POST["email"]) && !empty($_POST["password"]) ) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password =password_hash( $_POST["password"], PASSWORD_DEFAULT);
    $firstname = $_POST["firstname"];
   
       // Préparer la requête pour éviter les injections SQL
       $stmt = $connexion->prepare("INSERT INTO user (name, firstname, email, password) VALUES (?, ?, ?, ?)");
       $stmt->bind_param("ssss", $name, $firstname, $email, $password);
   
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
