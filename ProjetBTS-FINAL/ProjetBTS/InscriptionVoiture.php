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
include("fonctionsApi.php");
include("api.php");

$NomSup = $_POST['NomSup'];


// Connexion à la base de données 
$conn = new mysqli($servername, $username, $password, $dbname);         //Sert a localiser la base

// Test de la connexion. 
if ($conn->connect_error) { 
    die("Echec de la connexion: " . $conn->connect_error); 
}
    else{

       
//Insérer des enregistrements dans une table (exemples d’un formulaire de contact) 
        AddPlaqueFromForm();



    }

//test si l’enregistrement est réussi 
    if ($conn->query($sql) === TRUE) { 
        echo "Nouvel enregistrement réussi "; }
        else { 
        echo "Erreur: " . $sql . "<br>" . $conn->error; 
    }
 
    header('Status: 301 Moved Permanently', false, 301);      
    header('Location: Index.php');      
    exit();      
    

?> 
</body> 
 
</html> 