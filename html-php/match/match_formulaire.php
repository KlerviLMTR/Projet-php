<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            margin-top : 5px;
        }
    </style>
</head>
<body>
    <?php
        include_once("../config.php");
        include_once("./match_formulaire_requetes.php");
        include_once("./modifier_match.php");
    ?>
    
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
        <input type="radio" name="lieu_rencontre" value="domicile"
            <?php
                pr_lieu_match_dom();
            ?>
        >
        <label for="domicile">Domicile</label>
        <br>
        <input type="radio" name="lieu_rencontre" value="exterieur"
            <?php
                pr_lieu_match_ext();
            ?>
        >
        <label for="exterieur">Exterieur</label>
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