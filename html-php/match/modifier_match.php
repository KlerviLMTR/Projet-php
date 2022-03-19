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


?>