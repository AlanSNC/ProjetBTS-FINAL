
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Parking Lycée Newton</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <div class="contenu">

            <div class="centre categorie">
                <p class="categorie">PARKING NEWTON</p>
            </div>

            <h1></h1>

            <div class="separateur"></div>

            <!-- Mon commentaire HTML -->
            <div class="centre">
                <p class="description">"Cette page n'a pas les droits."</p>
            </div>

            <div class="info">
                <img class="centre info" src="parking.jpg">

                <table class="info">
                    <tr>
                        <th><a href = index.php> Accueil </a></th>
                        <th><a href = recherche.php>Recherche</a></th>
                        <th><a href = adminAffichage2.php>Admin</a></th>


                        <th></th>
                        <th></th> 
                    </tr>
                    
                </table>
            </div>

            <legend><h1></h1></legend> 

<form method="post" action="recherche.php"> 

<label for="text">Entrez votre Nom </label> 
<input type="text" name="NomSearch" id="NomSearch"> <br><br>

<form method="post" action="recherche.php"> 

<label for="text">Entrez votre Plaque </label> 
<input type="text" name="PlaqueSearch" id="PlaqueSearch"> <br><br>

<input type="submit" value="Envoyer">

<table border>
                <tr>
                    <th>Plaque récente</th>
                    <th>Presence de la voiture</th>
                    <th>Heure de mouvement</th>
                </tr>
                     <?php 

include("db_connect.php");
ini_set('display_errors', 'off');
    $sql = "SELECT Plaque, Nom, Id_car, Park_plaque, Car_presence, Change_tmp
     FROM plaque_allow
     RIGHT JOIN parkpresence ON plaque_allow.Plaque = parkpresence.Park_plaque";

if($_POST['NomSearch']!= NULL && $_POST['PlaqueSearch']!= NULL){
    echo "Veuiilez remplir QU'UN SEUL champ";}
   
   elseif($_POST['NomSearch']== NULL && $_POST['PlaqueSearch']== NULL){
       echo "Veuiilez remplir un champ";}

   else{
    $response = array();
    if($_POST['NomSearch']!= NULL && $_POST['PlaqueSearch']== NULL ){
        $sql .= " WHERE Nom='".$_POST['NomSearch']."'";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result))
        {
            
           ?><th><?php echo $row['Park_plaque'];?></th>
                        
           <th><?php if($row['Car_presence']==0){
               echo'Voiture ABSENTE';}
               else {
                   echo'Voiture PRESENTE';
               }
           ?></th>
        
           <th><?php echo $row['Change_tmp'];}}?></th><?php
    }
   
    if($_POST['NomSearch']== NULL && $_POST['PlaqueSearch']!= NULL ){
       $sql .= " WHERE Plaque='".$_POST['PlaqueSearch']."'";
       $result = mysqli_query($conn, $sql);
       while($row = mysqli_fetch_array($result))
       {
           
          ?><th><?php echo $row['Park_plaque'];?></th>
                       
          <th><?php if($row['Car_presence']==0){
              echo'Voiture ABSENTE';}
              else {
                  echo'Voiture PRESENTE';
              }
          ?></th>
       
          <th><?php echo $row['Change_tmp'];}}?></th>
   
   


   




        </div>

    </body>     
</html>        
