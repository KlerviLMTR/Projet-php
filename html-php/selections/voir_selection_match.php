<?php
include_once('../config.php');
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/selection.css">';
include_once('../nav.php');

if(!empty($_POST['note_joueur'])){
    $update_perf="update participer set performance=:performance where Id_joueur=:id_joueur and Id_match_=:id_match";
    $decl_perf=$pdo->prepare($update_perf);
    $decl_perf->execute(array('performance'=>$_POST['note_joueur'],'id_joueur'=>$_POST['id_joueur'],'id_match'=>$_POST['id_match']));
}

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
        $titulaire="titulaire";
    }else{
        $titulaire="remplaçant";
    }

    echo '<div class="grille">
        <img src="'.$rs['chemin_photo'].'" width="100px" height="210px">
        <span class="nom">'.$rs['nom'].' '.$rs["prenom"].'</span>
        <span class="poste">'.$rs['poste_prefere'].' '.$titulaire.'</span>
        <span class="taille">'.$rs['taille'].'cm</span>
        <span class="poids">'.$rs['poids'].'kg</span>
        <span class="naissance">Né(e) le '.$rs['date_naissance'].'</span>
        <form action="voir_selection_match?idmatch='.$resSelection['0']['12'].'" method="post">
            <label for"statut">Note</label>
            <select name="note_joueur"> 
                <option value="" disabled selected>'.$rs['performance'].'</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>  
            <input type="text" hidden name="id_joueur" value="'.$rs["Id_joueur"].'">
            <input type="text" hidden name="id_match" value="'.$rs["Id_match_"].'">
            <input type="submit" value="valider" class="valider" name="enr_statut"/>
        </form>
    </div>';



    // if($rs['etre_titulaire_o_n_']==1){
    //     echo 'Le joueur '.$rs['nom'].' '.$rs["prenom"].' au poste '.$rs['poste_prefere'].' est titulaire<br>';
    //     echo 'Sa date de naissance est le '.$rs['date_naissance'].', son poids est '.$rs['poids'].' et mesure '.$rs['taille'].'cm.<br>';
    // }else{
    //     echo 'Le joueur '.$rs['nom'].' '.$rs["prenom"].' au poste '.$rs['poste_prefere'].' est remplaçant<br>';
    //     echo 'Sa date de naissance est le '.$rs['date_naissance'].', son poids est '.$rs['poids'].' et mesure '.$rs['taille'].'cm.<br>';
    // }
    // if($rs["date_match"] < date("Y-m-d")){
    //     //Match déjà passé
    //     echo '<form action="voir_selection_match?idmatch='.$resSelection['0']['12'].'" method="post">
    //                 <label for"statut">Ajouter une note</label>
    //                 <select name="note_joueur"> 
    //                     <option value="" disabled selected>'.$rs['performance'].'</option>
    //                     <option value="1">1</option>
    //                     <option value="2">2</option>
    //                     <option value="3">3</option>
    //                     <option value="4">4</option>
    //                     <option value="5">5</option>
    //                 </select>  
    //                 <input type="text" hidden name="id_joueur" value="'.$rs["Id_joueur"].'">
    //                 <input type="text" hidden name="id_match" value="'.$rs["Id_match_"].'">
    //                 <input type="submit" value="valider" class="valider" name="enr_statut"/>
    //             </form><br>';
    // }else{
    //     //Match pas passé
    //     echo'caca';
    // }
}



?>