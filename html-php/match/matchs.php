<?php 
include_once('../session.php');
verification_session();
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/matchs.css">';
include_once('../nav.php');
include_once('./fonctions_match.php');
?>
    <div id="main_cont">
        <main>
            
            <h1>Liste des matchs :</h1>
            <hr id="main_sep">
            <a href="match_formulaire.php" id="form">
                    <img src="../../images-deco/add.svg" alt="icone ajouter">
                    Ajouter un match</a>
            <br><br>
            <?php
                include_once('../config.php');

                //Vérfier si un joueur a été supprimé:
                supprimer_match($pdo);

                //Récupérer toutes les données nécessaires à l'affichage des matchs:
            

                //Affichage des joueurs :
                afficher_match($pdo);

            ?>
        </main>
    </div>
    <?php
    include_once("../footer.php");
?>
    
</body>
</html>