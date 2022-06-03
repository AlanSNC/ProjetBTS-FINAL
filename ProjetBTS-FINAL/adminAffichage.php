
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
                <th><a href = adminAffichage.php>Admin</a></th>
              <!--   <th><a href = tp.html>Mini projets</a></th>
                <th><a href = documentations.html>Documentations</a></th> -->

                <th></th>
                <th></th> 
            </tr>
            
            
        </table>
    </div>
   ';
   <?php
    if($_POST['Password']!="a"){
        

        echo " <form method="post" action="adminAffichage.php">  

        <label for="text">Entrez votre Mot de passe: </label> 
        <input type="password" name="Password" id="Password"> <br><br>
        
        <input type="submit" value="Envoyer">
        Mot de passe incorrect";}

        elseif($_POST['Password']=="NULL"){
            echo " <form method="post" action="adminAffichage.php"> > 

            <label for="text">Entrez votre Mot de passe: </label> 
            <input type="password" name="Password" id="Password"> <br><br>
            
            <input type="submit" value="Envoyer">"}

        else {

       
          echo '
        

                <table class="info">
                    <tr>
                        <th><a href = index.php> Accueil </a></th>
                        <th><a href = ajoutVoiture.html>Ajouter</a></th>
                        <th><a href = modVoiture.html>Modifier</a></th>
                         <th><a href = tp.html>Supprimer</a></th>
                       <!-- <th><a href = documentations.html>Documentations</a></th> -->

                        <th></th>
                        <th></th> 
                    </tr>
                    
                    
                </table>
            
    
    </body>     
</html>        
';}
