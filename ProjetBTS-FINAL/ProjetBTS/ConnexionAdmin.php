<!DOCTYPE html> 
 
<html> 
<head> 
<title>Redirection page Index</title> 
<meta charset=”utf-8”> 
</head> 
 
<body> 
<?php 

// Connexion a la BDD
include("db_connect.php");



// Connexion à la base de données 
$conn = new mysqli($servername, $username, $password, $dbname);         //Sert a localiser la base

// Test de la connexion. 
if ($conn->connect_error) { 
    die("Echec de la connexion: " . $conn->connect_error); 
}
    else{


       


    }

//test si l'user est autorisé
    if ($conn->query($sql) === TRUE) { 
        echo "Connexion "; }
        else { 
        echo "Erreur: " . $sql . "<br>" . $conn->error; 
    }
 
    header('Status: 301 Moved Permanently', false, 301);      
    header('Location: Index.php');      
    exit();      
    

?> 
</body> 
 
</html> 