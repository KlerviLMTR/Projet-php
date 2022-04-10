<?php
include_once('../config.php');
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/joueurs.css">
<link rel="stylesheet" href="../../css-scss/selection.css">';
include_once('../nav.php');
include_once('../joueurs/fonctions_joueur.php');

if(!empty($_POST['note_joueur'])){
    $update_perf="update participer set performance=:performance where Id_joueur=:id_joueur and Id_match_=:id_match";
    $decl_perf=$pdo->prepare($update_perf);
    $decl_perf->execute(array('performance'=>$_POST['note_joueur'],'id_joueur'=>$_POST['id_joueur'],'id_match'=>$_POST['id_match']));
}

$selection="SELECT distinct * FROM joueur, participer, match_ WHERE joueur.Id_joueur = participer.Id_joueur AND match_.Id_match_ = participer.Id_match_ AND match_.id_match_=:match";
$stmt=$pdo->prepare($selection);
$stmt->execute(array('match'=>$_GET['idmatch']));
$resSelection = $stmt->fetchAll();
?>
<div id="main_cont">
    <main>
    <h1>Liste des joueurs pour la sélection :</h1>
    <hr id="main_sep">
<?php
echo '<div id="selection"> Voici la sélection du match joué contre l\'équipe '.$resSelection['0']['18'].' s\'effectuant en '.$resSelection['0']['19'].' :<br>
<h4>Date du match :</h4> <p>'.$resSelection['0']['16'].'</p><br>
<h4>Heure du match :</h4> <p>'.$resSelection['0']['17'].'</p><br>';
if($resSelection['0']['16'] < date("Y-m-d")){
    echo 'match terminé. ';
    if(!empty($resSelection['0']['20']) && !empty($resSelection['0']['20'])){
        echo 'Score : <p>'.$resSelection['0']['20'].' - '.$resSelection['0']['21'].'</p>';
    }else{
        echo 'Pas de score ajouté pour le moment';
    }
}else{
    echo '<h2>match à venir</h2>';
}

echo '</div></br></br>';


foreach($resSelection as $rs){
    if($rs['etre_titulaire_o_n_']==1){
        $titulaire="titulaire";
    }else{
        $titulaire="remplaçant";
    }

    echo '
    <div class="grille">
        <div class="img" >
            <img src="'.$rs["chemin_photo"].'" width="150px" height="200px" alt="">
            <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="210px" id="cadre_portrait">

        </div>

        <div class="poste">
            <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($rs['poste_prefere']).'" alt="icone poste" height="50px" >
            <h2 class="titres_carte">'.$rs["poste_prefere"].' '.$titulaire.'</h2>
            <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($rs['poste_prefere']).'" alt="icone poste" height="50px" >

        </div>

        <hr class="sep_grille">

        <div class="nom">
            <p>'.$rs["prenom"].' '.$rs["nom"].'</p>
        </div>

        <div class="dateN">
            <h4 class="titres_carte">Né(e) le:</h4>
            <p>'.$rs["date_naissance"].'</p>
        </div>

        <div class="num">
            <h4 class="titres_carte">Licence :</h4>
            <p>n°'.$rs["numero_licence"].'</p>
        </div>

        <div class="taille">
            <h4 class="titres_carte">Taille :</h4>
            <p>'.$rs["taille"].' cm</p>
        </div>

        <div class="poids">
            <h4 class="titres_carte">Poids :</h4>
            <p>'.$rs["poids"].' kg</p>
        </div>';
        if($resSelection['0']['16'] < date("Y-m-d")){

        
        echo '
        <div class="note">
            <form action="voir_selection_match?idmatch='.$resSelection['0']['12'].'" method="post">
                <label for"note">Note</label>
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
        </div>';}

        
    echo '</div>';

    // echo '<div class="grille">
    //     <img src="'.$rs['chemin_photo'].'" width="100px" height="210px">
    //     <span class="nom">'.$rs['nom'].' '.$rs["prenom"].'</span>
    //     <span class="poste">'.$rs['poste_prefere'].' '.$titulaire.'</span>
    //     <span class="taille">'.$rs['taille'].'cm</span>
    //     <span class="poids">'.$rs['poids'].'kg</span>
    //     <span class="naissance">Né(e) le '.$rs['date_naissance'].'</span>
    //     <form action="voir_selection_match?idmatch='.$resSelection['0']['12'].'" method="post">
    //         <label for"statut">Note</label>
    //         <select name="note_joueur"> 
    //             <option value="" disabled selected>'.$rs['performance'].'</option>
    //             <option value="1">1</option>
    //             <option value="2">2</option>
    //             <option value="3">3</option>
    //             <option value="4">4</option>
    //             <option value="5">5</option>
    //         </select>  
    //         <input type="text" hidden name="id_joueur" value="'.$rs["Id_joueur"].'">
    //         <input type="text" hidden name="id_match" value="'.$rs["Id_match_"].'">
    //         <input type="submit" value="valider" class="valider" name="enr_statut"/>
    //     </form>
    // </div>';
}



?>
</main>
</div>