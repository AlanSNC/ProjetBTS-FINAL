
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Parking Lycée Newton</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php include("db_connect.php"); ?>
        <div class="contenu">

            <div class="centre categorie">
                <p class="categorie">PARKING NEWTON</p>
            </div>

            <h1></h1>

            <div class="separateur"></div>

            <!-- Mon commentaire HTML -->
            

            <div class="info">
                <img class="centre info" src="parking.jpg">

                <table class="info">
                    <tr>
                        <th><a href = index.php> Accueil </a></th>
                        <th><a href = recherche.php>Recherche</a></th>
                        <th><a href = adminAffichage2.php>Admin</a></th>
                      <!--   <th><a href = tp.html>Mini projets</a></th>
                        <th><a href = documentations.html>Documentations</a></th> -->

                        <th></th>
                        <th></th> 
                    </tr>
                    
                </table>
            </div>

            <div>
                <div class="colonne1 colonne">
                <div class="ingredients">
                    <h2>Liste des voitures Autoris&eacute;es</h2>
                    <table border>
                        
                <tr>
                    <th>Nom</th>
                    <th>Plaque</th>
                    <th>Heure d'enregistrement</th>
                </tr>
                    
                
                <?php

        
        $sql = "SELECT Nom,Plaque,Register_tmp FROM plaque_allow";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
         // Lecture de chaque enregistrement de la table
         while($row = $result->fetch_assoc()) {

         $nom=$row["Nom"];
         $plaque=$row["Plaque"];
         $reg_tmp=$row["Register_tmp"];
         ?>
         
            <?php//On affiche les lignes du tableau une à une à l'aide d'une boucle
            while($row = mysql_fetch_array($reponse))
            {
            ?>
                <tr>
                    <th><?php echo $row['Nom'];?></th>
               
                    <th><?php echo $row['Plaque'];?></th>
                
                    <th><?php echo $row['Register_tmp'];?></th>
                    
                </tr>
                
            <?php
            

    
         }

}

?>
</table>
                       <!-- <p><a href="sujets/Les_variables_en_python.pdf" target="_blank"> <b>Cours.1</b>: Python_variables_affichage_formatage</a> </p>
                        <p><a href="sujets/Les_conditions_en_python.pdf" target="_blank"> <b>Cours.2</b>: Python_Les_structures_conditionnelles</a> </p>
                        <p><a href="sujets/Les_boucles_en_python.pdf" target="_blank"> <b>Cours.3</b>: Python_Les_boucles.pdf</a> </p>
                        <p><a href="sujets/Les_listes_en_python.pdf" target="_blank"> <b>Cours.4</b>: Python_Les_listes</a> </p>
                        <p><a href="sujets/Les_tuples_en_python.pdf" target="_blank"> <b>Cours.5</b>: Python_Les_tuples</a> </p>
                        <p><a href="sujets/Les_dictionnaires_en_python.pdf" target="_blank"> <b>Cours.6</b>: Python_Les_dictionnaires</a> </p>
                        <p><a href="sujets/Les_fonctions_en_python.pdf" target="_blank"> <b>Cours.7</b>: Python_Les_fonctions</a> </p>
                        <p><a href="sujets/Les_fonctions_en_python_suite.pdf" target="_blank"> <b>Cours.8</b>: Python_Les_fonctions (suite)</a> </p>
                        <p><a href="sujets/T.P.9.Python_Création_lecture_écriture_fichiers.pdf" target="_blank"> <b>Cours.9</b>: Python_Création_lecture_écriture_fichiers</a> </p>
                        <p><a href="sujets/T.P.10.Python_POO_Classe_Méthodes_Attributs.pdf" target="_blank"> <b>Cours.10</b>: Python_POO_Classe_Méthodes_Attributs</a> </p>
                        <p><a href="under_construction.html" target="_blank"> <b>Cours.11</b>: Python_Les_interfaces_graphiques_en_PySide6</a> </p>
                        <p><a href="sujets/Base de données et Python_cours 2021.pdf" target="_blank"> <b>Cours.12</b>: Python_Les_bases_de_données</a> </p>
                        <p><a href="under_construction.html" target="_blank"> <b>Cours.13</b>: Python_Les_expressions_régulières</a> </p>
                        <p><a href="under_construction.html" target="_blank"> <b>Cours.14</b>: Python_Communication_serie</a> </p>
                        <p><a href="under_construction.html" target="_blank"> <b>Cours.15</b>: Python_Communication_réseau</a> </p> -->
                        
                        
                    </div>
                </div>
        
                <div class="colonne2 colonne">
                    
                    <h2>Liste des voitures dans le Parking</h2>
                    <table border>
                <tr>
                    <th>Plaque récente</th>
                    <th>Presence de la voiture</th>
                    <th>Heure de mouvement</th>
                </tr>
                    
                
                    <?php

                    if ($conn->connect_error) { 
    die("Echec de la connexion: " . $conn->connect_error); 
}
    else{
        
        $sql = "SELECT Park_plaque,Car_presence,Change_tmp FROM parkpresence";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
         // Lecture de chaque enregistrement de la table
         while($row = $result->fetch_assoc()) {

         $park_plaque=$row["Park_plaque"];
         $car_presence=$row["Car_presence"];
         $change_tmp=$row["Change_tmp"];
         ?>
         
            <?php//On affiche les lignes du tableau une à une à l'aide d'une boucle
            while($row = mysql_fetch_array($reponse))
            {
            ?>
                <tr>
                    
                    <th><?php echo $row['Park_plaque'];?></th>
                 
                    <th><?php if($row['Car_presence']==0){
                        echo'Voiture ABSENTE';}
                        else {
                            echo'Voiture PRESENTE';
                        }
                    ?></th>
                 
                    <th><?php echo $row['Change_tmp'];?></th>
                    
                </tr>
                
            <?php
            

    } 
         }

}



?>

</table>

                


                </div>
            </div>
        </div>

    </body>     
</html>        
