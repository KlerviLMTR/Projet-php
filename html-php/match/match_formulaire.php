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
    ?>
    <form action="./match_formulaire.php" method="POST">
        <h1>Ajouter un nouveau match :</h1>
        <label for="date">Date du match :</label>
        <input type="date" name="date">
        <br>
        <label for="heure">Heure du match :</label>
        <input type="time" name="heure">
        <br>
        <label for="equipe_adverse">Equipe adverse :</label>
        <input type="text" name="equipe_adverse">
        <br>
        <input type="radio" name="lieu_rencontre" value="domicile">
        <label for="domicile">Domicile</label>
        <br>
        <input type="radio" name="lieu_rencontre" value="exterieur">
        <label for="exterieur">Exterieur</label>
        <br>
        <input type="text" hidden name="Id_match">
        <input type="submit" value="valider">

    </form>
</body>
</html>