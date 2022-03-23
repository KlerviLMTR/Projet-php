<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css-scss/template.css">
    <style>
        form{
            width:50%;
            display:flex;
            flex-direction:column;
        }
        .ligne_form{
            display:flex;
        }

        .lab{
            text-align:right;
            flex:1;
        }

        .champ{
            margin-left:5px;
            flex:2;
        }


    </style>
</head>
<body>

    <?php
        include_once('../config.php');
        include_once('formulaire_requetes.php');
        include_once('modifier_joueur.php');
    ?>

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
        <h1>Ajouter un joueur :</h1>
        <a href="../joueurs/joueurs.php">lien vers l'affichage des joueurs</a>
        <form action="./formulaire.php" enctype="multipart/form-data" method="POST">

            <div class="ligne_form">
                <label for="nom" class="lab">Nom :</label>
                <input type="text" name="nom" class="champ" minlength="2" maxlength ="50" 
                <?php
                    pr_nom();
                ?>
                >
            </div>

            <div class="ligne_form">
                <label for="prenom" class="lab">Prénom :</label>
                <input type="text" name="prenom" class="champ" minlenght="2" maxlength="50"
                <?php
                    pr_prenom();
                ?>
                >
            </div>

            <div class="ligne_form">
                <label for="licence" class="lab">Numéro de licence :</label>
                <input type="tel" name="licence" maxlength="8" class="champ" minlength="8"
                <?php
                    pr_licence(); 
                ?>
                >
            </div>

            <div class="ligne_form">
                <label for="dateN" class="lab">Date de naissance :</label>
                <input type="date" name="dateN" class="champ"
                <?php
                    pr_dateN();
                ?>
                >
            </div>

            <div class="ligne_form">
                <label for="taille" class="lab">Taille :</label>
                <input type="tel" name="taille" class="champ" minlength="2" maxlength="3" 
                <?php
                    pr_taille();
                ?>
                >
            </div>

            <div class="ligne_form">
                <label for="poids" class="lab">Poids :</label>
                <input type="tel" name="poids" class="champ" minlength="2" maxlength="3" 
                <?php
                    pr_poids();
                ?>
                >
            </div>

            <p>Poste préféré :</p>
            <div>
                <input type="radio" name="poste" value="Attrapeur"
                <?php
                    pr_poste_att();
                ?>
                >
                <label for="Attrapeur">Attrapeur</label
                >
            </div>

            <div>
                <input type="radio" name="poste" value="Poursuiveur"
                <?php
                    pr_poste_pours();
                ?>
                >
                <label for="Poursuiveur">Poursuiveur</label>
            </div>

            <div>
                <input type="radio" name="poste" value="Batteur"
                <?php
                    pr_poste_batt();
                ?>
                >
                <label for="Batteur">Batteur</label>
            </div>

            <div>
                <input type="radio" name="poste" value="Gardien"
                <?php
                    pr_poste_gard();
                ?>
                >
                <label for="Gardien">Gardien</label>
            </div>

            <div>
                <label for="image">Importer une image :</label>
                <input type="file" name="image">
            </div>

            <input type="text" hidden name="Id_joueur"
            <?php
                pr_id();
            ?>
            >
            <input type="submit" value="enregistrer">
        </form>
    
    </main>
</body>
</html>