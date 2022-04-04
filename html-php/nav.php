<?php
include_once('session.php');
include_once('config.php');
echo '</head>
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

            <a href="../match/matchs.php" class ="lien-nav">
                <img src="../../images-deco/agenda.svg"class="icone" alt="icone matchs">
                <p>Matchs</p>
            </a>
            <a href="../statistiques/statistiques.php" class ="lien-nav">
                <img src="../../images-deco/leaderboard.svg"class="icone" alt="icone stats">
                <p>Statistiques</p>
            </a>

            <a href="../deconnexion.php" class ="lien-nav">
                <img src="../../images-deco/logout.svg"class="icone" alt="icone logout">
                <p>Se déconnecter</p>
            </a>
        </div>

    </nav>';

?>
