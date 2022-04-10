<?php
    function pr_nom($joueur){
            echo 'value ="'.$joueur['0']['1'].'"';
    }

    function pr_prenom($joueur){
            echo 'value ="'.$joueur['0']['2'].'"';
    }

    function pr_licence($joueur){
            echo 'value ="'.$joueur['0']['3'].'"';
        
    }

    function pr_dateN($joueur){
            echo 'value ="'.$joueur['0']['4'].'"';
    }

    
    function pr_photo($joueur){
            echo ''.$joueur['0']['5'].'';
    }

    
    function pr_taille($joueur){
            echo 'value ="'.$joueur['0']['6'].'"';
    }

    
    function pr_poids($joueur){
            $v8=substr($joueur['0']['7'],0,-2);
            echo 'value ="'.$v8.'"';
    }

    
    function pr_poste_att($joueur){
            if(($joueur['0']['8'])=="Attrapeur"){
                echo 'checked';
        }
    }

    function pr_poste_pours($joueur){
            if(($joueur['0']['8'])=="Poursuiveur"){
                echo 'checked';
            }
        
    }

    function pr_poste_batt($joueur){
            if(($joueur['0']['8'])=="Batteur"){
                echo 'checked';
            }
    }

    function pr_poste_gard($joueur){
            if(($joueur['0']['8'])=="Gardien"){
                echo 'checked';
            }
        
    }

    function pr_id($joueur){
            echo 'value ="'.$joueur['0']['0'].'"';
    }

    
?>