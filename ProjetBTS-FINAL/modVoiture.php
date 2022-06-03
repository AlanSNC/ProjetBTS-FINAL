<?php

// Connexion a la BDD
include("db_connect.php");


// Connexion à la base de données 
global $conn;
$conn = new mysqli($servername, $username, $password, $dbname);         //Sert a localiser la base





if (preg_match("/[A-Z]{2}[0-9]{3}[A-Z]{2}/i",$_POST['PlaqueNew']) && preg_match("/[A-Z]{2}[0-9]{3}[A-Z]{2}/i",$_POST['PlaqueOld']) && preg_match("/[A-Z]{1,15}/i",$_POST['NomMod']))
 {
 
$query="UPDATE plaque_allow SET Plaque='".$_POST['PlaqueNew']."' WHERE Plaque='".$_POST['PlaqueOld']."'";
 if(mysqli_query($conn, $query))
 {
 $response=array(
 'status' => 1,
 'status_message' =>'Plaque modified with success.'
 );
 header('Location: index.php');
 }
 else
 {
 $response=array(
 'status' => 0,
 'status_message' =>'Failure with the modification '.
mysqli_error($conn)
 );
 }
 header('Content-Type: application/json');
 echo json_encode($response);
 }

 else{
    header('Location: index.php');
 }

 ?>