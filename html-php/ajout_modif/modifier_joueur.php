<?php
    function pr_nom(){
        if( isset($_GET["v2"])){
            echo 'value ="'.$_GET["v2"].'"';
        }
    }

    function pr_prenom(){
        if( isset($_GET["v3"])){
            echo 'value ="'.$_GET["v3"].'"';
        }
    }

    function pr_licence(){
        if( isset($_GET["v4"])){
            echo 'value ="'.$_GET["v4"].'"';
        }
    }

    function pr_dateN(){
        if( isset($_GET["v5"])){
            echo 'value ="'.$_GET["v5"].'"';
        }
    }

    
    function pr_photo(){
        if( isset($_GET["v6"])){
            echo 'value ="'.$_GET["v6"].'"';
        }
    }

    
    function pr_taille(){
        if( isset($_GET["v7"])){
            echo 'value ="'.$_GET["v7"].'"';
        }
    }

    
    function pr_poids(){
        if( isset($_GET["v8"])){
            $v8=substr($_GET["v8"],0,-2);
            echo 'value ="'.$v8.'"';
        }
    }

    
    function pr_poste_att(){
        if( isset($_GET["v9"])){
            if(($_GET["v9"])=="Attrapeur"){
                echo 'checked';
            }
        }
    }

    function pr_poste_pours(){
        if( isset($_GET["v9"])){
            if(($_GET["v9"])=="Poursuiveur"){
                echo 'checked';
            }
        }
    }

    function pr_poste_batt(){
        if( isset($_GET["v9"])){
            if(($_GET["v9"])=="Batteur"){
                echo 'checked';
            }
        }
    }

    function pr_poste_gard(){
        if( isset($_GET["v9"])){
            if(($_GET["v9"])=="Gardien"){
                echo 'checked';
            }
        }
    }

    function pr_id(){
        if( isset($_GET["v1"])){
            echo 'value ="'.$_GET["v1"].'"';
        }
    }

    
?>