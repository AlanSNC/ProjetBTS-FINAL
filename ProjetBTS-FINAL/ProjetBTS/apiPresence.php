<?php
    // Connexion a la BDD
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

    //Afficher BDD JSON
$response=array();
 

if($conn){   
     $sql = "select * from parkpresence";
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





    
    
/*switch($request_method){

case 'GET':
 
    // Retrive Products
 if(!empty($_GET["Id_plaque"])){
    $Id_plaque=intval($_GET["Id_plaque"]);
    
    if($Id_plaque==1){
        getPlaque($Id_plaque);
}
    else{
    getPlaque($Id_plaque);
 }
 }

 else{
 getPlaques();
 }
 break;
 
 default:
 // InvalId_plaque Request Method
 header("HTTP/1.0 405 Method Not Allowed");
 break;

/*case 'POST':
    // Ajouter un produit
AddPlaque();
break;
   
case 'PUT':
    // Modifier un produit
$Id_plaque = intval($_GET["Id_plaque"]);
updatePlaque($Id_plaque);
break;
   
case 'DELETE':
    // Supprimer un produit
 $Id_plaque = intval($_GET["Id_plaque"]);
 deletePlaque($Id_plaque);
 break;
    

}*/



    ?>
