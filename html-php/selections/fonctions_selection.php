<?php
function selection_batteur($batteurs){
    foreach($batteurs as $b){
        echo $b['nom'].$b['prenom'].'';
        echo '<select name="batteurs[]" id="">';
        echo '<option></option>';
        echo '<option value="'.$b['Id_joueur'].'|1">titulaire</option>';
        echo '<option value="'.$b['Id_joueur'].'|0">remplaçant</option>';
        echo '</select></br>';
    }
}

function selection_attrapeur($attrapeurs){
    foreach($attrapeurs as $a){
        echo $a['nom'].$a['prenom'].'';
        echo '<select name="attrapeurs[]" id="">';
        echo '<option></option>';
        echo '<option value="'.$a['Id_joueur'].'|1">titulaire</option>';
        echo '<option value="'.$a['Id_joueur'].'|0">remplaçant</option>';
        echo '</select></br>';
    }
}

function selection_gardien($gardiens){
    foreach($gardiens as $g){
        echo $g['nom'].$g['prenom'].'';
        echo '<select name="gardiens[]" id="">';
        echo '<option></option>';
        echo '<option value="'.$g['Id_joueur'].'|1">titulaire</option>';
        echo '<option value="'.$g['Id_joueur'].'|0">remplaçant</option>';
        echo '</select></br>';
    }
}

function selection_poursuiveur($poursuiveurs){
    foreach($poursuiveurs as $p){
        echo $p['nom'].$p['prenom'].'';
        echo '<select name="poursuiveurs[]" id="">';
        echo '<option></option>';
        echo '<option value="'.$p['Id_joueur'].'|1">titulaire</option>';
        echo '<option value="'.$p['Id_joueur'].'|0">remplaçant</option>';
        echo '</select></br>';
    }   
}
?>