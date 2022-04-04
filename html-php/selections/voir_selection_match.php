<?php
include_once('../config.php');
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">';
include_once('../nav.php');

$selection="SELECT distinct * FROM joueur, participer, match_ WHERE joueur.Id_joueur = participer.Id_joueur AND match_.Id_match_ = participer.Id_match_ AND match_.id_match_=:match";
$stmt=$pdo->prepare($selection);
$stmt->execute(array('match'=>$_GET['idmatch']));
$resSelection = $stmt->fetchAll();
echo '<div style="margin-top:150px;"> Voici la sélection du match '.$resSelection['0']['12'].' joué contre l\'équipe '.$resSelection['0']['18'].' s\'effectuant en '.$resSelection['0']['19'].' :<br>
Date du match : '.$resSelection['0']['16'].'<br>
Heure du match : '.$resSelection['0']['17'].'<br>

</div></br></br>';

foreach($resSelection as $rs){
    if($rs['etre_titulaire_o_n_']==1){
        echo 'Le joueur '.$rs['nom'].' '.$rs["prenom"].' au poste '.$rs['poste_prefere'].' est titulaire<br>';
        echo 'Sa date de naissance est le '.$rs['date_naissance'].', son poids est '.$rs['poids'].' et mesure '.$rs['taille'].'cm.<br><br>';
    }else{
        echo 'Le joueur '.$rs['nom'].' '.$rs["prenom"].' au poste '.$rs['poste_prefere'].' est remplaçant<br>';
        echo 'Sa date de naissance est le '.$rs['date_naissance'].', son poids est '.$rs['poids'].' et mesure '.$rs['taille'].'cm.<br><br>';
    }
}

// echo var_dump($resSelection['0']);



?>