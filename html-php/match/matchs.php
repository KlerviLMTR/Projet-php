<?php 
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">';
include_once('../nav.php');
include_once('./fonctions_match.php');
?>
    
    <main>
        
        <h1>Liste des matchs</h1>
        <a href="./match_formulaire.php">Lien pour ajouter un match</a>
        <?php
            include_once('../config.php');

            //Vérfier si un joueur a été supprimé:
            supprimer_match($pdo);

            //Récupérer toutes les données nécessaires à l'affichage des matchs:
           

            //Affichage des joueurs :
            afficher_match($pdo);

        ?>
    </main>
    
</body>
</html>