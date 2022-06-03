<?php
 include("db_connect.php");
 $request_method = $_SERVER["REQUEST_METHOD"];

 function getPlaques(){
 global $conn;
 $response=array();
 if($conn){
      $sql = "select * from parkpresence ";
      $result = mysqli_query($conn,$sql);
      if($result){
          header("Content-Type: JSON");
          $i=0;
          while($row = mysqli_fetch_assoc ($result)){
              $response[$i]['Id_car'] = $row ['Id_car'];
              $response[$i]['Park_plaque'] = $row ['Park_plaque'];
              $response[$i]['Car_presence'] = $row ['Car_presence'];
              $response[$i]['Change_tmp'] = $row ['Change_tmp'];
              $i++;}

              echo json_encode($response, JSON_PRETTY_PRINT);}
 
          }
  else{
      echo "DataBase connection failed";}
  }

 function getPlaque($id_car)
 {
 global $conn;
 $query = "SELECT * FROM parkpresence";
 $id_car=0;
 if($id_car != 0)
 {
    $query .= " WHERE Id_car=".$id_car." LIMIT 1";
   // $query .= " WHERE Id_car=".$id_car;
 }
 $response = array();
 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result))
 {
 $response[] = $row['Park_plaque'];
 }
 header('Content-Type: application/json');
 echo json_encode($response, JSON_PRETTY_PRINT);
 }

 function AddPlaque()
 {
 global $conn;
 $park_plaque = $_POST["Park_plaque"];

 echo $query="INSERT INTO parkpresence(Park_plaque) VALUES('".$park_plaque."')";
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
    
function updatePresence($park_plaque)
{
 global $conn;
 $data = json_decode(file_get_contents("php://input"),true);

 $query = "SELECT * FROM parkpresence WHERE Park_plaque='".$park_plaque."'";
   
 
 $response = array();
 $result = mysqli_query($conn, $query);
 while($row = mysqli_fetch_array($result))
 {
 $response['Car_presence'] = $row['Car_presence'];
 }
 
 $car_presence = $response['Car_presence'];
 
   if($car_presence==0){
 $query="UPDATE parkpresence SET Car_presence= 1 WHERE Park_plaque='".$park_plaque."'";
 $car_presence=1;}
      else{
 $query="UPDATE parkpresence SET Car_presence= 0 WHERE Park_plaque='".$park_plaque."'";
 $car_presence=0;}
      
 if(mysqli_query($conn, $query))
 {
 $response=array(
 'status' => 1,
 'status_message' =>'Plaque updated with success.'
 );
 echo "Valeur:".$car_presence;
 }

 else
 {
 $response=array(
 'status' => 0,
 'status_message' =>'Failure with the parkpresence update'.
mysqli_error($conn)
 );
 echo "Valeur:".$car_presence;
 }
 header('Content-Type: application/json');
 echo json_encode($response);}
 
 
 function deletePlaque($id_car)
 {
    global $conn;
    $query = "DELETE FROM parkpresence WHERE Id_car=".$id_car;
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

 switch($request_method)
 {

 case 'GET':
 // Retrive Products
 if(!empty($_GET["Id_car"]))
 {
 $id_car=intval($_GET["Id_car"]);
 if($id_car==1)
 {
    getPlaque($id_car);
 }
 else
 {
getPlaques();
 }
}


break;
default:

// Invalid Request Method
header("HTTP/1.0 405 Method Not Allowed");
break;
case 'POST':
   // Ajouter un produit
   AddPlaque();
   break;
  
   case 'PUT':
   // Modifier un produit

   $park_plaque = "AA000AA";
   updatePresence($park_plaque);
   break;
   
   case 'DELETE':
    // Supprimer un produit
    $id_car = intval($_GET["Id_car"]);
    deletePlaque(21);
    break;
    }

   
   
