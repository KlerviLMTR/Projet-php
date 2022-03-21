<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css-scss/template.css">
</head>
<body>
    <!-- HEADER -->
    <nav>
        <a href="#" id="lien-logo">
            <img src="../images-deco/logo.svg" id="logo" alt="logo Tutshill Tornados">
        </a>

        <div id="nav_cont">
            <a href="./joueurs/joueurs.php" class ="lien-nav">
                <img src="../images-deco/people.svg"class="icone" alt="icone joueurs">
                <p>Joueurs</p>
            </a>

            <a href="./match/matchs.php" class ="lien-nav">
                <img src="../images-deco/agenda.svg"class="icone" alt="icone matchs">
                <p>Matchs</p>
            </a>
            <a href="" class ="lien-nav">
                <img src="../images-deco/leaderboard.svg"class="icone" alt="icone stats">
                <p>Statistiques</p>
            </a>

            <a href="" class ="lien-nav">
                <img src="../images-deco/logout.svg"class="icone" alt="icone logout">
                <p>Se déconnecter</p>
            </a>
        </div>

    </nav>
    <?php
        include_once('config.php');

        $sql = "select * from joueur ";
        $prep = $pdo->prepare($sql);
        $prep -> execute();
        $resultat = $prep->fetchAll();

        foreach($resultat as $joueur){
            echo '<img src ="'.$joueur['chemin_photo'].'">';
        }

        // echo '
        //     <img src="./photos/fred_weasley.jpg">
        // ';
    
    ?>


</body>
</html>