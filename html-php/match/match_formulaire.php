<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css-scss/template.css">
    <style>
        input {
            margin-top : 5px;
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
    <?php
        include_once("../config.php");
        include_once("./match_formulaire_requetes.php");
        include_once("./modifier_match.php");
    ?>
    
    <a href="./matchs.php">Lien pour revenir à la feuille des matchs</a>
    <form action="./match_formulaire.php" method="POST">
        <h1>Ajouter un nouveau match :</h1>
        <label for="date">Date du match :</label>
        <input type="date" name="date"
            <?php
                pr_date_match();
            ?>
        >
        <br>
        <label for="heure">Heure du match :</label>
        <input type="time" name="heure"
            <?php
                pr_heure_match();
            ?>
        >
        <br>
        <label for="equipe_adverse">Equipe adverse :</label>
        <input type="text" name="equipe_adverse"
            <?php
                pr_equipe_adverse();
            ?>
        >
        <br>
        <input type="radio" name="lieu_rencontre" value="Domicile"
            <?php
                pr_lieu_match_dom();
            ?>
        >
        <label for="Domicile">Domicile</label>
        <br>
        <input type="radio" name="lieu_rencontre" value="Exterieur"
            <?php
                pr_lieu_match_ext();
            ?>
        >
        <label for="Exterieur">Exterieur</label>
        <br>
        <input type="text" hidden name="Id_match"
            <?php
                pr_id_match();
            ?>
        >
        <input type="submit" value="valider">

    </form>
</body>
</html>