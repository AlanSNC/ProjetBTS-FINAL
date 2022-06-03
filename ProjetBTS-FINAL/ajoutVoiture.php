<?php 

// Connexion a la BDD
include("db_connect.php");


// Connexion à la base de données 
$conn = new mysqli($servername, $username, $password, $dbname);         //Sert a localiser la base
global $conn; 

if (preg_match("/[A-Z]{2}[0-9]{3}[A-Z]{2}/i",$_POST['Plaque']) && preg_match("/[A-Z]{1,15}/i",$_POST['Nom']))
 {
    $query = "INSERT IGNORE INTO plaque_allow (Plaque,Nom) 
    VALUES ('$_POST[Plaque]','$_POST[Nom]')";
    

    if(mysqli_query($conn, $query))
    {
    $response=array(
    'status' => 1,
    'status_message' =>'Plaque added with success.'
    );
    }
    else
    {
    $response=array(
    'status' => 0,
    'status_message' =>'ERROR!.'. mysqli_error($conn)
    );}

    header('Location: index.php');
 
 }
 else
 {

header('Location: ajoutVoiture.html');
 }



    
   
        
    

   


    
    
    
    ?>