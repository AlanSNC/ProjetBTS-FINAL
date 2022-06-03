<?php 

echo '<!DOCTYPE html> 
 
<html> 
<head> 
<title>Index Voitures Autorisées</title> 
<meta charset=”utf-8”> 
</head> 
 
<body> ';


// Connexion a la BDD
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];


// Test de la connexion. 

if ($conn->connect_error) { 
    die("Echec de la connexion: " . $conn->connect_error); 
}
    else{
        echo "Bonjour<br><br>";
        include ("api.php");
        $sql = "SELECT Nom,Plaque,Register_tmp FROM plaque_allow";
        $result = $conn->query($sql);
        getPlaque();
        if ($result->num_rows > 0) {
         // Lecture de chaque enregistrement de la table
         while($row = $result->fetch_assoc()) {
         echo "Propriétaire de la voiture: " . $row["Nom"]. " "."Plaque de la voiture: " . $row["Plaque"]." "."Heure de l'enregistrements: " . $row["Register_tmp"]."". "<br><br>";
        
         }
        }} 
    
    
    echo '<a href="InscriptionVoiture.html">Votre voiture nest pas autorisée? Cliquez ici pour vous inscrire.</a>
</body> 
 
</html> ';