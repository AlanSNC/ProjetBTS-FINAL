<?php

function getPlaquesAllow()                   //
    {
    global $conn;
    $query = "SELECT * FROM plaque_allow";
    $response = array();
    $result = mysqli_query($conn, $query);

    while($row = mysqli_fetch_array($result))
    {
    $response[] = $row['Plaque'];
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
    }


/*function getLastPlaque()
    {
    global $conn;
    $query = "SELECT * FROM plaque_allow ORDER BY Id_plaque DESC LIMIT 1";
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result))
    {
    $response[] = $row['Plaque'];
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
    }*/
   
function getPlaque($nom=0)
    {
    global $conn;
    $query = "SELECT * FROM plaque_allow";
if($nom != 0){
    $query .= " WHERE Nom=".$nom." LIMIT 1";
}
    $response = array();
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_array($result)){
    $response[] = $row['Plaque'];
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);}


function AddPlaqueFromForm()
    {
    global $conn;
   
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
    );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
    }
 
/*function AddPlaqueFromCam()
 {
 global $conn;
 // $plaqueIdentified = $_POST["Plaque"]; //Add from formulaire

 $query="INSERT INTO plaque(TEMP) VALUES('".$plaque."')";
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
 );
 }
 header('Content-Type: application/json');
 echo json_encode($response);
 }*/

/*
 function updatePlaque($Id_plaque)
 {
 global $conn;
 $data = json_decode(file_get_contents("php://input"),true);
 $temp = $data["temp"];
 $query="UPDATE parking SET TEMP='".$temp."' WHERE id=".$Id_plaque;
 if(mysqli_query($conn, $query))
 {
 $response=array(
 'status' => 1,
 'status_message' =>'Plaque updated with success.'
 );
 }
 else
 {
 $response=array(
 'status' => 0,
 'status_message' =>'Failure with the plaque update'.
mysqli_error($conn)
 );
 }
 header('Content-Type: application/json');
 echo json_encode($response);
 }*/

 /*function deletePlaque($nom)
 {
 global $conn;
 $query = "DELETE FROM plaque_allow WHERE Nom".$nom;
 VALUES ('$_POST[Nom]');

 
 if(mysqli_query($conn, $query))
 {
 $response=array(
 'status' => 1,
 'status_message' =>'Plaque deleted with success.'
 );
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
*/

function deletePlaque()
 {
 global $conn;
 $NomSup=$_POST['NomSup'];
 $query = "DELETE FROM plaque_allow WHERE Nom=".$NomSup;



 /*$query = "INSERT IGNORE INTO plaque_allow (Plaque,Nom) 
 VALUES ('$_POST[Plaque]','$_POST[Nom]')";*/
 
 if(mysqli_query($conn, $query))
 {
 $response=array(
 'status' => 1,
 'status_message' =>'Plaque deleted with success.'
 );
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
 ?>