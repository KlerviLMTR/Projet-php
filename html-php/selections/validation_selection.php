<?php
include_once('../config.php');

$countg=0;
$counta=0;
$countb=0;
$countp=0;


foreach($_POST['gardiens'] as $g){
    if(!empty($g)){
        list($id,$place) = explode('|', $g);
        if($place==1){
            $countg++;
            $gardientitu = $id;
        }else{
            $gardienremplacant = $id;
        }
    }
    
}
foreach($_POST['attrapeurs'] as $a){
    if(!empty($a)){
        list($id,$place) = explode('|', $a);
        if($place==1){
            $counta++;
            $attrapeurtitu = $id;
        }else{
            $attrapeurremplacant = $id;
        }
    }
    
}
$batteurstitu = [];
$batteursremplacant = [];
foreach($_POST['batteurs'] as $b){
    if(!empty($b)){
        list($id,$place) = explode('|', $b);
        if($place==1){
            $countb++;
            array_push($batteurstitu, $id);
        }else{
            array_push($batteursremplacant, $id);
        }
    }
    
}

$pourstitu = [];
$poursrempl = [];
foreach($_POST['poursuiveurs'] as $p){
    if(!empty($p)){
        list($id,$place) = explode('|', $p);
        if($place==1){
            $countp++;
            array_push($pourstitu, $id);
        }else{
            array_push($poursrempl, $id);
        }
    }
    
}

if($counta !=1 || $countb != 2 || $countg != 1 || $countp != 3){
    header('Location: selection_match.php?idmatch='.$_POST['idmatch']);
}


$declverif=$pdo->prepare('select * from participer where Id_match_=:id');
$declverif->execute(array('id'=>$_POST['idmatch']));
$verification=$declverif->fetchAll();

$donnees =[
    'attrapeurtitu1' => $attrapeurtitu,
    'batteurtitu1' => $batteurstitu[0],
    'batteurtitu2' => $batteurstitu[1],
    'gardientitu' => $gardientitu,
    'poursuiveurtitu1' => $pourstitu[0],
    'poursuiveurtitu2' => $pourstitu[1],
    'poursuiveurtitu3' => $pourstitu[2],
    'attrapeurremplacant1' => $attrapeurremplacant,
    'batteurremplacant1' => $batteursremplacant[0],
    'batteurremplacant2' => $batteursremplacant[1],
    'gardienremplacant' => $gardienremplacant,
    'poursuiveurremplacant1' => $poursrempl[0],
    'poursuiveurremplacant2' =>  $poursrempl[1],
    'poursuiveurremplacant3' =>  $poursrempl[2],
    'match' => $_POST['idmatch']
];

if(sizeof($verification) == 0){
    $insert='INSERT INTO participer(Id_joueur, Id_match_, etre_titulaire_o_n_) VALUES
        (:attrapeurtitu1,:match,"1"),
        (:batteurtitu1,:match,"1"),
        (:batteurtitu2,:match,"1"),
        (:gardientitu,:match,"1"),
        (:poursuiveurtitu1,:match,"1"),
        (:poursuiveurtitu2,:match,"1"),
        (:poursuiveurtitu3,:match,"1"),
        (:attrapeurremplacant1,:match,"0"),
        (:batteurremplacant1,:match,"0"),
        (:batteurremplacant2,:match,"0"),
        (:gardienremplacant,:match,"0"),
        (:poursuiveurremplacant1,:match,"0"),
        (:poursuiveurremplacant2,:match,"0"),
        (:poursuiveurremplacant3,:match,"0")
        ;';
}
else{
    $insert='DELETE FROM participer WHERE Id_match=:match ; INSERT INTO participer(Id_joueur, Id_match_, etre_titulaire_o_n_) VALUES
        (:attrapeurtitu1,:match,"1"),
        (:batteurtitu1,:match,"1"),
        (:batteurtitu2,:match,"1"),
        (:gardientitu,:match,"1"),
        (:poursuiveurtitu1,:match,"1"),
        (:poursuiveurtitu2,:match,"1"),
        (:poursuiveurtitu3,:match,"1"),
        (:attrapeurremplacant1,:match,"0"),
        (:batteurremplacant1,:match,"0"),
        (:batteurremplacant2,:match,"0"),
        (:gardienremplacant,:match,"0"),
        (:poursuiveurremplacant1,:match,"0"),
        (:poursuiveurremplacant2,:match,"0"),
        (:poursuiveurremplacant3,:match,"0")
        ;';
}

$decl = $pdo->prepare($insert);
$decl->execute($donnees);


header('Location: ../match/matchs.php');

?>