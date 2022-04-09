<?php
    include_once('../session.php');
    verification_session();
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/joueurs.css">';
include_once('../nav.php');
include_once('../config.php');
include_once('../joueurs/fonctions_joueur.php');

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

    <div id="main_cont">
        <main>

        

    <h1>Statistiques</h1><br>
    <h2>Matchs</h2><br>
    Nombre total de matchs joués : <?php echo $nbMatchs ?><br>
    Gagnés : <?php echo round($prctMatchsGagnes,2) ?> %<br>
    Perdus : <?php echo round($prctMatchsPerdus,2) ?> %<br>
    Nuls : <?php echo round($prctMatchsNuls,2) ?> %<br>
    <h2>Joueurs</h2><br>

    <?php

        //Stats par joueurs
        $sql = "SELECT chemin_photo, nom, prenom, statut, poste_prefere, tmp.nb_tit, tmp.nb_remp, tmp2.performance, round(tmp.nb_match_gag / tmp.nb_match * 100, 2) as pourc_match_gag
                from joueur
                    LEFT JOIN
                        (SELECT Id_joueur, 
                            sum(if(etre_titulaire_o_n_=1 AND score_equipe IS NOT NULL AND score_adverse IS NOT NULL,1,0)) as nb_tit, 
                            sum(if(etre_titulaire_o_n_=0 AND score_equipe IS NOT NULL AND score_adverse IS NOT NULL,1,0)) as nb_remp,
                            sum(if(score_equipe IS NOT NULL AND score_adverse IS NOT NULL,1,0)) as nb_match,
                            sum(if(score_equipe > score_adverse,1,0)) as nb_match_gag
                        from participer, match_
                        where participer.Id_match_ = match_.Id_match_
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


            echo '
            <div class="grille">
            <div class="img" >
                <img src="'.$joueur["chemin_photo"].'" width="150px" height="200px" alt="">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="210px" id="cadre_portrait">

            </div>
            <br class="sep_grille">
            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($joueur['poste_prefere']).'" alt="icone poste" height="50px" >
                <h2 class="titres_carte">'.$joueur["poste_prefere"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($joueur['poste_prefere']).'" alt="icone poste" height="50px" >

            </div>

            <hr class="sep_grille">

            <div class="nom">
                <p>'.$joueur["prenom"].' '.$joueur["nom"].'</p>
            </div>

            <div class="dateN">
                <h4 class="titres_carte">Note :</h4>
                <p>'.$joueur['performance'].'/5</p>
            </div>

            <div class="num">
                <h4 class="titres_carte">Matchs gagnés :</h4>
                <p>'.$joueur['pourc_match_gag'].'%</p>
            </div>

            <div class="taille">
                <h4 class="titres_carte">Titularisations :</h4>
                <p>'.$joueur['nb_tit'].'</p>
            </div>

            <div class="poids">
                <h4 class="titres_carte">Remplacements :</h4>
                <p>'.$joueur['nb_remp'].'</p>
            </div>

            <div class="statut">
                <h4 class="titres_carte">Statut :</h4>
                <p>'.$joueur["statut"].'</p>
            </div>


              
            
        </div>';







            //  echo "<b>".$joueur['nom']." ".$joueur['prenom']."</b><br>";
            //  echo "Poste : ".$joueur['poste_prefere']."<br>";
            //  echo "Statut : ".$joueur['statut']."<br>";
            //  echo "Nombre de titularisations : ".$joueur['nb_tit']."<br>";
            //  echo "Nombre de remplacements : ".$joueur['nb_remp']."<br>";
            //  echo "Performance moyenne sur 5 : ".$joueur['performance']."<br>";
            //  echo "Matchs gagnés : ".$joueur['pourc_match_gag']." %<br>";

            //  echo "<br>";
 
         }


    ?>


        </main>
    </div>

    
</body>
</html>