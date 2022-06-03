
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
    

<?php
    if($_POST['Password']=='a'){
        echo '<div class="contenu">

            <div class="centre categorie">
                <p class="categorie">PARKING NEWTON</p>
            </div>

            <h1></h1>

            <div class="separateur"></div>

            <!-- Mon commentaire HTML -->
            <div class="centre">
                <p class="description">"Cette page a les droits réservé à l&apos;administrateur."</p>
            </div>

            <div class="info">
                <img class="centre info" src="parking.jpg">

                <table class="info">
                    <tr>
                        <th><a href = index.php> Accueil </a></th>
                        <th><a href = ajoutVoiture.html>Ajouter</a></th>
                        <th><a href = modVoiture.html>Modifier</a></th>
                         <th><a href = supVoiture.html>Supprimer</a></th>
                       <!-- <th><a href = documentations.html>Documentations</a></th> -->

                        <th></th>
                        <th></th> 
                    </tr>
                    
                    
                </table>
            </div>

        </div>';
    }
    
    else{
        header('Location: adminAffichage2.php');

    }?>
    
    </body>     
</html>        

