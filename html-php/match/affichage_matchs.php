<?php



    foreach($resultat as $match){

        $id_m = $match['Id_match_'];

        echo '
        <div id="ligne_grille">

        
        <div class="date">
            <p>Date du match : '.$match["date_match"].' '.$match["heure_match"].'</p>
        </div>

        <div class="equipe_adverse">
            <p>Equipe adverse : '.$match["equipe_adverse"].'</p>
        </div>


        <div class="lieu">
            <p>'.$match["lieu"].'</p>
        </div>';

        if (empty($match["score_equipe"]) || empty($match["score_adverse"])) {
            echo 'Score à venir';
        } else {
            echo 
            '<div class="score_equipe">
                <p>Score : '.$match["score_equipe"].' - '.$match["score_adverse"].'</p>
            </div>';
        }


       echo '
        <div class="footer">
            <a href="./match_formulaire.php?v1='.$match["Id_match_"].'&v2='.$match["date_match"].'&v3='.$match["heure_match"].'&v4='.$match["lieu"].'&v5='.$match["score_equipe"].'&v6='.$match["score_adverse"].'&v7='.$match["equipe_adverse"].'
            ">✎</a>
            <a href="./matchs.php?idsupp='.$match["Id_match_"].'">🗑</a>
            <a href="../selections/selection_match.php?idmatch='.$match["Id_match_"].'">Ajout d\'une sélection</a>
        </div>

        ';
    }
?>