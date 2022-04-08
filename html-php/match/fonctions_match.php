<?php
    function pr_id_match(){
        if (isset($_GET['v1'])){
            echo 'value='.$_GET['v1'];
        }
    }

    function pr_date_match(){
        if (isset($_GET['v2'])){
            echo 'value='.$_GET['v2'];
        }
    }

    function pr_heure_match(){
        if (isset($_GET['v3'])){
            echo 'value='.$_GET['v3'];
        }
    }

    function pr_lieu_match_dom(){

        if (isset($_GET['v4'])){
            if ($_GET['v4'] == 'domicile'){
                echo 'checked';
            }     
        }
    }

    function pr_lieu_match_ext(){

        if (isset($_GET['v4'])){
            if ($_GET['v4'] == 'exterieur'){
                echo 'checked';
            }     
        }
    }

    function pr_equipe_adverse(){
        if (isset($_GET['v7'])){
            echo 'value='.$_GET['v7'];
        }
    }

    function requete_match_formulaire($pdo){

        // Vérifier que tous les champs ont été saisis
        if(!empty($_POST['date']) && (!empty($_POST['heure']) && !empty($_POST['equipe_adverse']) 
        && !empty($_POST['lieu_rencontre']))){
            
            //Cas de la modif : le champ caché "id_match" est renseigné
    
            if (!empty($_POST['Id_match'])){
                $sql_modif = "UPDATE match_ SET date_match = :date, heure_match = :heure, equipe_adverse = :equipe_adv, lieu = :lieu WHERE Id_match_ = :id" ;
                
                $donnees =  [
                            'date' => $_POST['date'],
                            'heure' => $_POST['heure'],
                            'equipe_adv' => $_POST['equipe_adverse'],
                            'lieu' => $_POST['lieu_rencontre'],
                             'id' => $_POST[('Id_match')]
                ];
    
                $decl = $pdo -> prepare($sql_modif);
                $decl -> execute($donnees);
                echo 'modifOk';
            }
            else {
                $sql = "insert into match_ (date_match, heure_match, equipe_adverse, lieu) values ( :date, :heure ,:equipe_adv, :lieu);";
                
                $donnees = [
                    'date' => $_POST['date'],
                    'heure' => $_POST['heure'],
                    'equipe_adv' => $_POST['equipe_adverse'],
                    'lieu' => $_POST['lieu_rencontre']
                ];
    
                $decl = $pdo -> prepare($sql);
                $decl -> execute($donnees);
                $res = $decl -> fetchall();
                
                echo $_POST['date'];
                echo $_POST['heure'];
    
    
                foreach($res as $ligne){
                    echo 'coucou';
                }
    
            }
        }
    }

    function supprimer_match($pdo){
        if(isset($_GET["idsupp"])){
    
            $donnees=[
                'id_m' => $_GET["idsupp"]
            ];
    
            //SUPPRESSION DU MATCH DANS LA BDD
            $suppr_sql = 'delete from match_ where match_.Id_match_= :id_m ;';
            $decl = $pdo -> prepare($suppr_sql);
            $decl -> execute($donnees);
    
        }
    }

    function afficher_match($pdo){

        if(!empty($_POST['score_equipe']) && !empty($_POST['score_adversaire'])){
            $score="update match_ set score_equipe=:score_equipe, score_adverse=:score_adversaire where Id_match_=:id_match";
            $decl_score=$pdo->prepare($score);
            $decl_score->execute(array('score_equipe'=>$_POST["score_equipe"],'score_adversaire'=>$_POST["score_adversaire"],'id_match'=>$_POST["id_match"]));
        }
    
        $sql = "select * from match_";
        $prep = $pdo->prepare($sql);
        $prep -> execute();
        $resultat = $prep->fetchAll();
        foreach($resultat as $match){
    
            $id_m = $match['Id_match_'];
    
            echo '
            <div class="ligne_grille">
    
            
                <div class="date">
                    <p>Date du match : '.$match["date_match"].' '.$match["heure_match"].'</p>
                </div>
        
                <div class="equipe">
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
                    <a href="../selections/voir_selection_match?idmatch='.$match["Id_match_"].'">Voir la sélection de ce match</a>
                </div>
        
                ';

                if($match["date_match"] < date("Y-m-d")){
                    echo '<div class="joué">le mactch est passé.</div>';
                    echo '<form action="matchs.php" method="post" id="ajout_score">
                    <!--<label for="score_equipe">Notre score</label>-->
                    <input type="number" name="score_equipe">
                    <!--<label for="score_adversaire">Score adversaire</label>-->
                    <input type="number" name="score_adversaire">
                    <input type="text" name="id_match" value="'.$match["Id_match_"].'" hidden>
                    <input type="submit">
                    </form>  ';
                }else{
                    echo '<div class="joué">le mactch à venir.</div>';
                    echo '<a href="../selections/selection_match.php?idmatch='.$match["Id_match_"].'" id="ajout_selection">Ajout d\'une sélection</a>';
                }

            echo'</div><br>';
        }
    }

?>