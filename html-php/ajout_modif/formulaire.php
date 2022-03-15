<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <h1>Ajouter un joueur :</h1>
    <a href="../joueurs/joueurs.php">lien vers l'affichage des joueurs</a>
    <form action="./formulaire.php" enctype="multipart/form-data" method="POST">

        <div class="ligne_form">
            <label for="nom" class="lab">Nom :</label>
            <input type="text" name="nom" class="champ"
            <?php
                pr_nom();
            ?>
            >
        </div>

        <div class="ligne_form">
            <label for="prenom" class="lab">Prénom :</label>
            <input type="text" name="prenom" class="champ"
            <?php
                pr_prenom();
            ?>
            >
        </div>

        <div class="ligne_form">
            <label for="licence" class="lab">Numéro de licence :</label>
            <input type="number" name="licence" class="champ"
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
            <input type="number" name="taille" class="champ"
            <?php
                pr_taille();
            ?>
            >
        </div>

        <div class="ligne_form">
            <label for="poids" class="lab">Poids :</label>
            <input type="number" name="poids" class="champ"
            <?php
                pr_poids();
            ?>
            >
        </div>

        <p>Poste préféré :</p>
        <div>
            <input type="radio" name="poste" value="attrapeur"
            <?php
                pr_poste_att();
            ?>
            >
            <label for="attrapeur">Attrapeur</label
            >
        </div>

        <div>
            <input type="radio" name="poste" value="poursuiveur"
            <?php
                pr_poste_pours();
            ?>
            >
            <label for="poursuiveur">Poursuiveur</label>
        </div>

        <div>
            <input type="radio" name="poste" value="batteur"
            <?php
                pr_poste_batt();
            ?>
            >
            <label for="batteur">Batteur</label>
        </div>

        <div>
            <input type="radio" name="poste" value="gardien"
            <?php
                pr_poste_gard();
            ?>
            >
            <label for="gardien">Gardien</label>
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

</body>
</html>