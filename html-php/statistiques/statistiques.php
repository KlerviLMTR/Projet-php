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
    <title>Statistiques</title>
</head>
<body>



    <?php

    include_once('../config.php');

    //Nombre de matchs joués dont le résultat a été saisi :
    $sql = "SELECT count(*) FROM match_
            WHERE score_equipe is not null 
            AND score_adverse is not null;";
    $prep = $pdo->prepare($sql);
    $prep -> execute();
    $resNbMatchs = $prep->fetchAll();
    $nbMatchs;
    foreach ($resNbMatchs as $ligne) {
        $nbMatchs = $ligne['0'];
    }

    //Nombre de matchs gagnés :
    $sql = "SELECT count(*) FROM match_
            WHERE score_equipe > score_adverse;";
    $prep = $pdo->prepare($sql);
    $prep -> execute();
    $resNbMatchsGagnes = $prep->fetchAll();
    $nbMatchsGagnes;
    foreach ($resNbMatchsGagnes as $ligne) {
        $nbMatchsGagnes = $ligne['0'];
    }
    // % matchs gagnés
    $prctMatchsGagnes = $nbMatchsGagnes/$nbMatchs*100;

    //Nombre de matchs perdus :
    $sql = "SELECT count(*) FROM match_
            WHERE score_equipe < score_adverse;";
    $prep = $pdo->prepare($sql);
    $prep -> execute();
    $resNbMatchsPerdus = $prep->fetchAll();
    $nbMatchsPerdus;
    foreach ($resNbMatchsPerdus as $ligne) {
        $nbMatchsPerdus = $ligne['0'];
    }
    // % matchs perdus
    $prctMatchsPerdus = $nbMatchsPerdus/$nbMatchs*100;

    //Nombre de matchs nuls :
    $sql = "SELECT count(*) FROM match_
            WHERE score_equipe = score_adverse;";
    $prep = $pdo->prepare($sql);
    $prep -> execute();
    $resNbMatchsNuls = $prep->fetchAll();
    $nbMatchsNuls;
    foreach ($resNbMatchsNuls as $ligne) {
        $nbMatchsNuls = $ligne['0'];
    }
    // % matchs nuls
    $prctMatchsNuls = $nbMatchsNuls/$nbMatchs*100;
    

    ?>


    <h1>Statistiques</h1><br>
    <h2>Matchs</h2><br>
    Nombre total de matchs joués : <?php echo $nbMatchs ?><br>
    Gagnés : <?php echo round($prctMatchsGagnes,2) ?> %<br>
    Perdus : <?php echo round($prctMatchsPerdus,2) ?> %<br>
    Nuls : <?php echo round($prctMatchsNuls,2) ?> %<br>
    <h2>Joueurs</h2><br>

    




    
</body>
</html>