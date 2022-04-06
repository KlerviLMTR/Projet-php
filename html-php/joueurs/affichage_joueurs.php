<?php
    foreach($resultat as $joueur){
        echo '
        <div id="grille">
            <div class="img" >
                <img src="'.$joueur["chemin_photo"].'" width="150px" height="200px" alt="">
                <img src="../../images-deco/attribution-requise/SS/Cadre-photo.svg" alt="Cadre portrait" height="210px" id="cadre_portrait">

            </div>

            <div class="poste">
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($joueur['poste_prefere']).'" alt="icone poste" height="50px" >
                <h2>'.$joueur["poste_prefere"].'</h2>
                <img src="../../images-deco/attribution-requise/IconFinder/'.afficher_img($joueur['poste_prefere']).'" alt="icone poste" height="50px" >

            </div>

            <hr class="sep_grille">

            <div class="nom">
                <h4>Identité :</h4>
                <p>'.$joueur["prenom"].' '.$joueur["nom"].'</p>
            </div>

            <div class="dateN">
                <h4>né(e) le:</h4>
                <p>'.$joueur["date_naissance"].'</p>
            </div>

            <div class="num">
                <h4>Licence :</h4>
                <p>n°'.$joueur["numero_licence"].'</p>
            </div>

            <div class="taille">
                <h4>Taille :</h4>
                <p>'.$joueur["taille"].' cm</p>
            </div>

            <div class="poids">
                <h4>Poids :</h4>
                <p>'.$joueur["poids"].' kg</p>
            </div>

            <div class="statut_comm">
                <form action="./joueurs.php" method="post">
                    <h4>Définir le statut :</h4>
                    <select name="statut"> 
                        <option value="" disabled selected>';
                        echo statut($joueur["statut"]).'</option>
                        <option value="Actif">Actif</option>
                        <option value="Absent">Absent</option>
                        <option value="Suspendu">Suspendu</option>
                        <option value="Blessé">Blessé</option>
                    </select>  
                    <input type="text" hidden value="'.$joueur["Id_joueur"].'" name="id">
                    <input type="submit" value="valider" class="valider" name="enr_statut"/>
                </form>
                <p>ajouter un commentaire</p>
                <form action="./joueurs.php" method="post">
                    <textarea name="commentaires">'.
                    $joueur["commentaires"]
                    .'</textarea>
                    <input type="submit" class="valider">
                </form>
            </div>  
            
            <div class="footer">
                <a href="../ajout_modif/formulaire.php?v1='.$joueur["Id_joueur"].'&v2='.$joueur["nom"].'&v3='.$joueur["prenom"].'&v4='.$joueur["numero_licence"].'&v5='.$joueur["date_naissance"].'&v6='.$joueur["chemin_photo"].'&v7='.$joueur["taille"].'&v8='.$joueur["poids"].'&v9='.$joueur["poste_prefere"].'
                ">✎</a>
                <a href="./joueurs.php?idsupp='.$joueur["Id_joueur"].'">🗑</a>
            </div>
        </div>';
    }
?>

