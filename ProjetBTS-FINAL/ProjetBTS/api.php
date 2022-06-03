<?php
    // Connexion a la BDD
include("db_connect.php");
$request_method = $_SERVER["REQUEST_METHOD"];

    //Afficher BDD JSON
$response=array();
 

if($conn){   
     $sql = "select * from plaque_allow";
     $result = mysqli_query($conn,$sql);
     if($result){
         header("Content-Type: JSON");
         $i=0;
         while($row = mysqli_fetch_assoc ($result)){
             $response[$i]['Id_plaque'] = $row ['Id_plaque'];
             $response[$i]['Plaque'] = $row ['Plaque'];
             $response[$i]['Nom'] = $row ['Nom'];
             $response[$i]['Register_tmp'] = $row ['Register_tmp'];
             $i++;}
                                 
         echo json_encode($response, JSON_PRETTY_PRINT);}

         }
 else{
     echo "DataBase connection failed";}


    ?>
