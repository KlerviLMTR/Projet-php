<?php
include_once('../joueurs/fonctions_joueur.php');
function selection_batteur($batteurs){
    foreach($batteurs as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="75px" height="100px" alt="">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="105px" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >

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
                <p>vide</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Titularisation :</h4>
                <select name="batteurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
        // echo $b['nom'].$b['prenom'].'';
        // echo '<select name="batteurs[]" id="">';
        // echo '<option></option>';
        // echo '<option value="'.$b['Id_joueur'].'|1">titulaire</option>';
        // echo '<option value="'.$b['Id_joueur'].'|0">remplaçant</option>';
        // echo '</select></br>';
    }
}

function selection_attrapeur($attrapeurs){
    foreach($attrapeurs as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="75px" height="100px" alt="">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="105px" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >

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
                <p>vide</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Titularisation :</h4>
                <select name="batteurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }
}

function selection_gardien($gardiens){
    foreach($gardiens as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="75px" height="100px" alt="">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="105px" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >

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
                <p>vide</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Titularisation :</h4>
                <select name="batteurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }
}

function selection_poursuiveur($poursuiveurs){
    foreach($poursuiveurs as $b){
        echo '
        <div class="grille">
            <div class="img" >
                <img src="'.$b["chemin_photo"].'" width="75px" height="100px" alt="">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="105px" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >
                <h2 class="titres_carte">'.$b["nom"].' '.$b["prenom"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($b['poste_prefere']).'" alt="icone poste" height="50px" >

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
                <p>vide</p> 
            </div>

            <div class="commentaires"> 
                <h4 class="titres_carte">Commentaires :</h4>
                <p class="commentaires">'.$b["commentaires"].'</p>
            </div>  

            <div class="titulaire">
                <h4 class="titres_carte">Titularisation :</h4>
                <select name="batteurs[]" id="">
                <option></option>
                <option value="'.$b['Id_joueur'].'|1">titulaire</option>
                <option value="'.$b['Id_joueur'].'|0">remplaçant</option>
                </select></br>  
            </div>
        </div>';
    }   
}
?>