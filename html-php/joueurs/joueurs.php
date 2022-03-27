<?php
    include_once('../session.php');
    verification_session();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css-scss/template.css">
    <style>


        #ligne_grille{
            margin-bottom: 20px;
            display: grid;
            grid-template-rows: 50px 50px 50px 50px ;
            grid-template-columns: 100px 150px 50px 75px;
            grid-template-areas: "img poste poste poste "
                                "img nom . ."
                                "img dateN . taille"
                                "img num . poids"
                                "footer footer footer footer";
        }

        .img {
            grid-area: img;
        }

        .poste{
            grid-area:poste;
        }

        .nom{
            grid-area:nom;
        }

        .dateN{
            grid-area:dateN;
        }

        .num{
            grid-area:num;
        }

        .taille{
            grid-area:taille;
        }

        .poids{
            grid-area:poids;
        }

        .footer{
            grid-area : footer;
        }

    </style>
</head>
<body>

<!-- HEADER -->
<nav>
        <a href="../index.php" id="lien-logo">
            <img src="../../images-deco/logo.svg" id="logo" alt="logo Tutshill Tornados">
        </a>

        <div id="nav_cont">
            <a href="./joueurs.php" class ="lien-nav">
                <img src="../../images-deco/people.svg"class="icone" alt="icone joueurs">
                <p>Joueurs</p>
            </a>

            <a href="../match/matchs.php" class ="lien-nav">
                <img src="../../images-deco/agenda.svg"class="icone" alt="icone matchs">
                <p>Matchs</p>
            </a>
            <a href="" class ="lien-nav">
                <img src="../../images-deco/leaderboard.svg"class="icone" alt="icone stats">
                <p>Statistiques</p>
            </a>

            <a href="" class ="lien-nav">
                <img src="../../images-deco/logout.svg"class="icone" alt="icone logout">
                <p>Se déconnecter</p>
            </a>
        </div>

    </nav>
    
    <main>

    <!-- à refactorer -->
    <a href="../deconnexion.php">Se déconnecter</a>


        <h1>Liste des joueurs :</h1>
        <a href="../ajout_modif/formulaire.php">Lien pour ajouter un joueur</a>
        <?php
            include_once('../config.php');

            //Vérfier si un joueur a été supprimé:
            include_once('./suppression_joueur.php');

            //Récupérer toutes les données nécessaires à l'affichage des joueurs:
            $sql = "select * from joueur ";
            $prep = $pdo->prepare($sql);
            $prep -> execute();
            $resultat = $prep->fetchAll();
        
            //Affichage des joueurs :
            include_once('affichage_joueurs.php');
            
        
        ?>
    </main>

    



</body>
</html>