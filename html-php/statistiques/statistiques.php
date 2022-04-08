<?php
    include_once('../session.php');
    verification_session();
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">';
include_once('../nav.php');
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
    if($nbMatchs!=0){
        $prctMatchsPerdus = $nbMatchsPerdus/$nbMatchs*100;
    }
    else{
        $prctMatchsPerdus = "NaN";
    }
    

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
    if($nbMatchs!=0){
        $prctMatchsNuls = $nbMatchsNuls/$nbMatchs*100;
    }else{
        $prctMatchsNuls = "NaN";
    }
    
    
    

    ?>


    <h1>Statistiques</h1><br>
    <h2>Matchs</h2><br>
    Nombre total de matchs joués : <?php echo $nbMatchs ?><br>
    Gagnés : <?php echo round($prctMatchsGagnes,2) ?> %<br>
    Perdus : <?php echo round($prctMatchsPerdus,2) ?> %<br>
    Nuls : <?php echo round($prctMatchsNuls,2) ?> %<br>
    <h2>Joueurs</h2><br>

    <?php

        //Stats par joueurs
        $sql = "SELECT nom, prenom, statut, poste_prefere, tmp.nb_tit, tmp.nb_remp, tmp2.performance
                from joueur
                    LEFT JOIN
                        (SELECT Id_joueur, sum(etre_titulaire_o_n_) as nb_tit, 
                            sum(if(etre_titulaire_o_n_=0,1,0)) as nb_remp
                        from participer
                        group by Id_joueur) as tmp
                    ON joueur.Id_joueur = tmp.Id_joueur
                    LEFT JOIN (SELECT Id_joueur, round(avg(performance),2) as performance
                        from participer
                        where performance IS NOT NULL
                        group by Id_joueur) as tmp2
                    ON joueur.Id_joueur = tmp2.Id_joueur;";
         $prep = $pdo->prepare($sql);
         $prep -> execute();
         $resJoueur = $prep->fetchAll();
         foreach ($resJoueur as $joueur) {
             echo "<b>".$joueur['nom']." ".$joueur['prenom']."</b><br>";
             echo "Poste : ".$joueur['poste_prefere']."<br>";
             echo "Statut : ".$joueur['statut']."<br>";
             echo "Nombre de titularisations : ".$joueur['nb_tit']."<br>";
             echo "Nombre de remplacements : ".$joueur['nb_remp']."<br>";
             echo "Performance moyenne : ".$joueur['performance']."<br>";

             echo "<br>";
 
         }


    ?>




    
</body>
</html>