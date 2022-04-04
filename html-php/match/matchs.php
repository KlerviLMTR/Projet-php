<?php 
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">';
include_once('../nav.php');
?>
    
    <main>
        
        <h1>Liste des matchs</h1>
        <a href="./match_formulaire.php">Lien pour ajouter un match</a>
        <?php
            include_once('../config.php');

            //Vérfier si un joueur a été supprimé:
            include_once('./suppression_match.php');

            //Récupérer toutes les données nécessaires à l'affichage des matchs:
            $sql = "select * from match_";
            $prep = $pdo->prepare($sql);
            $prep -> execute();
            $resultat = $prep->fetchAll();

            //Affichage des joueurs :
            include_once('affichage_matchs.php');

        ?>
    </main>
    
</body>
</html>