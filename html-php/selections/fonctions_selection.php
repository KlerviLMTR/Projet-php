<?php
include_once('../joueurs/fonctions_joueur.php');
function selection_batteur($pdo){

    $batteurs = 'SELECT taille, poids, commentaires, joueur.Id_joueur, chemin_photo, nom, prenom, statut, poste_prefere, tmp.nb_tit, tmp.nb_remp, tmp2.performance, round(tmp.nb_match_gag / tmp.nb_match * 100, 2) as pourc_match_gag
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
                    ON joueur.Id_joueur = tmp2.Id_joueur
                    WHERE poste_prefere="Batteur" AND statut="Actif";';
    $stmt = $pdo->prepare($batteurs);
    $stmt->execute();
    $batteurs = $stmt->fetchAll();
    foreach($batteurs as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="100px" height="130px" alt="portrait joueur">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" width="100px" height="145" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >

            </div>

            <hr class="sep_grille">

            <div class="taille">
                <h4 class="titres_carte">Taille :</h4>
                <p>'.$b["taille"].' cm</p>
            </div>

            <div class="poids">
                <h4 class="titres_carte">Poids :</h4>
                <p>'.$b["poids"].' kg</p>
            </div>

            <div class="note">
                <h4 class="titres_carte">Note :</h4>
                <p>'.$b["performance"].'/5</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte comm">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Rôle :</h4>
                <select name="batteurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }
}

function selection_attrapeur($pdo){

    $attrapeurs = 'SELECT taille, poids, commentaires, joueur.Id_joueur, chemin_photo, nom, prenom, statut, poste_prefere, tmp.nb_tit, tmp.nb_remp, tmp2.performance, round(tmp.nb_match_gag / tmp.nb_match * 100, 2) as pourc_match_gag
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
                    ON joueur.Id_joueur = tmp2.Id_joueur
                    WHERE poste_prefere="Attrapeur" AND statut="Actif";';
    $stmt = $pdo->prepare($attrapeurs);
    $stmt->execute();
    $attrapeurs = $stmt->fetchAll();
    foreach($attrapeurs as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="100px" height="130px" alt="portrait joueur">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" width="100px" height="145" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >

            </div>

            <hr class="sep_grille">

            <div class="taille">
                <h4 class="titres_carte">Taille :</h4>
                <p>'.$b["taille"].' cm</p>
            </div>

            <div class="poids">
                <h4 class="titres_carte">Poids :</h4>
                <p>'.$b["poids"].' kg</p>
            </div>

            <div class="note">
                <h4 class="titres_carte">Note moyenne:</h4>
                <p>'.$b["performance"].'/5</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte comm">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Rôle :</h4>
                <select name="attrapeurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }
}

function selection_gardien($pdo){
    $gardiens = 'SELECT taille, poids, commentaires, joueur.Id_joueur, chemin_photo, nom, prenom, statut, poste_prefere, tmp.nb_tit, tmp.nb_remp, tmp2.performance, round(tmp.nb_match_gag / tmp.nb_match * 100, 2) as pourc_match_gag
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
                    ON joueur.Id_joueur = tmp2.Id_joueur
                    WHERE poste_prefere="Gardien" AND statut="Actif";';
    $stmt = $pdo->prepare($gardiens);
    $stmt->execute();
    $gardiens = $stmt->fetchAll();
    foreach($gardiens as $b){
        echo '
        <div class="grille">
            <div class="img" >
            <img src="'.$b["chemin_photo"].'" width="100px" height="130px" alt="portrait joueur">
            <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" width="100px" height="145" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >

            </div>

            <hr class="sep_grille">

            <div class="taille">
                <h4 class="titres_carte">Taille :</h4>
                <p>'.$b["taille"].' cm</p>
            </div>

            <div class="poids">
                <h4 class="titres_carte">Poids :</h4>
                <p>'.$b["poids"].' kg</p>
            </div>

            <div class="note">
                <h4 class="titres_carte">Note moyenne:</h4>
                <p>'.$b["performance"].'/5</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte  comm">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Rôle :</h4>
                <select name="gardiens[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }
}

function selection_poursuiveur($pdo){
    $poursuiveurs = 'SELECT taille, poids, commentaires, joueur.Id_joueur, chemin_photo, nom, prenom, statut, poste_prefere, tmp.nb_tit, tmp.nb_remp, tmp2.performance, round(tmp.nb_match_gag / tmp.nb_match * 100, 2) as pourc_match_gag
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
                    ON joueur.Id_joueur = tmp2.Id_joueur
                    WHERE poste_prefere="Poursuiveur" AND statut="Actif";';
    
    $stmt = $pdo->prepare($poursuiveurs);
    $stmt->execute();
    $poursuiveurs = $stmt->fetchAll();
    foreach($poursuiveurs as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="100px" height="130px" alt="portrait joueur">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" width="100px" height="145" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="40px" >

            </div>

            <hr class="sep_grille">

            <div class="taille">
                <h4 class="titres_carte">Taille :</h4>
                <p>'.$b["taille"].' cm</p>
            </div>

            <div class="poids">
                <h4 class="titres_carte">Poids :</h4>
                <p>'.$b["poids"].' kg</p>
            </div>

            <div class="note">
                <h4 class="titres_carte">Note moyenne :</h4>
                <p>'.$b["performance"].'/5</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte comm">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Rôle :</h4>
                <select name="poursuiveurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }   
}
?>