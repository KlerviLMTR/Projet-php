<?php
    include_once('../session.php');
    include_once('../config.php');
    verification_session();

    include_once('./fonctions_joueur.php');

    if(isset($_POST['statut']) && isset($_POST['id'])){
        $nv_statut="update joueur set statut=:statut where Id_joueur=:id";
        $decl_nv=$pdo->prepare($nv_statut);
        $decl_nv->execute(array('id'=>$_POST['id'],'statut'=>$_POST['statut']));
    }

    include_once('../header.php');
    echo '<link rel="stylesheet" href="../../css-scss/template.css">
    <link rel="stylesheet" href="../../css-scss/joueurs.css">
    <link rel="stylesheet" href="../../css-scss/polices.css">';
    include_once('../nav.php');
    ?>

    <div id="main_cont">
        <main>

        <!-- à refactorer -->


            <h1>Liste des joueurs :</h1>
            <hr id="main_sep">
            <a href="../ajout_modif/formulaire.php">Lien pour ajouter un joueur</a>
            <?php

                //Vérfier si un joueur a été supprimé:
                supprimer_joueur($pdo);

                //Récupérer toutes les données nécessaires à l'affichage des joueurs:
                $sql = "select * from joueur ";
                $prep = $pdo->prepare($sql);
                $prep -> execute();
                $resultat = $prep->fetchAll();
            
                //Affichage des joueurs :
                include_once('affichage_joueurs.php');
                
            
            ?>
        
        </main>
    </div>
    <footer>
        <a href="../mentions_leg.html">Mentions légales</a>
        <a href="../sources.html">Sources des images</a>
        <a href="../contact.php">Nous contacter</a>
    </footer>



</body>
</html>