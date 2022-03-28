<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matchs</title>
    <link rel="stylesheet" href="../../css-scss/template.css">
</head>
<body>

<!-- HEADER -->
<nav>
        <a href="../index.php" id="lien-logo">
            <img src="../../images-deco/logo.svg" id="logo" alt="logo Tutshill Tornados">
        </a>

        <div id="nav_cont">
            <a href="../joueurs/joueurs.php" class ="lien-nav">
                <img src="../../images-deco/people.svg"class="icone" alt="icone joueurs">
                <p>Joueurs</p>
            </a>

            <a href="./matchs.php" class ="lien-nav">
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
        <a href="../selections/selection_match.php">Lien pour préparer les sélections</a>
        
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