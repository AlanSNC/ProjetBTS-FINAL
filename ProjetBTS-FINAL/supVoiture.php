<?php

// Connexion a la BDD
include("db_connect.php");


// Connexion à la base de données 
global $conn;
$conn = new mysqli($servername, $username, $password, $dbname);         //Sert a localiser la base

$plaqueSup=$_POST['PlaqueSup'];
$nomSup=$_POST['NomSup'];



if (preg_match("/[A-Z]{2}[0-9]{3}[A-Z]{2}/i",$_POST['PlaqueSup']) && preg_match("/[A-Z]{1,15}/i",$_POST['NomSup']))
 {
 
 $query = "DELETE FROM plaque_allow WHERE Plaque='".$_POST['PlaqueSup']."'"."AND "."Nom='".$_POST['NomSup']."'";
 if(mysqli_query($conn, $query))
 {
 $response=array(
 'status' => 1,
 'status_message' =>'Plaque deleted with success.'
 );
 header('Location: index.php');
 }
 else
 {
 $response=array(
 'status' => 0,
 'status_message' =>'Failure with the suppression '.
mysqli_error($conn)
 );
 }
 header('Content-Type: application/json');
 echo json_encode($response);
 }

 else{
    header('Location: index.html');
 }

 ?>