<?php
    include('./statut_joueur.php');

    foreach($resultat as $joueur){
        echo '
        <div id="grille">
            <div class="img" >
                <img src="'.$joueur["chemin_photo"].'" width="100px" height="200px" alt="">
            </div>

            <div class="poste">
                <h2>'.$joueur["poste_prefere"].'</h2>
            </div>

            <div class="nom">
                <p>'.$joueur["prenom"].' '.$joueur["nom"].'</p>
            </div>

            <div class="dateN">
                <p>né(e) le '.$joueur["date_naissance"].'</p>
            </div>

            <div class="num">
                <p>n°'.$joueur["numero_licence"].'</p>
            </div>

            <div class="taille">
                <p>'.$joueur["taille"].' cm</p>
            </div>

            <div class="poids">
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
                    <input type="submit" value="valider" name="enr_statut"/>
                </form>
                <a href="./commentaires_joueur.php?id='.$joueur["Id_joueur"].'">ajouter un commentaire </a> 
            </div>
            

            <div class="footer">
                <a href="../ajout_modif/formulaire.php?v1='.$joueur["Id_joueur"].'&v2='.$joueur["nom"].'&v3='.$joueur["prenom"].'&v4='.$joueur["numero_licence"].'&v5='.$joueur["date_naissance"].'&v6='.$joueur["chemin_photo"].'&v7='.$joueur["taille"].'&v8='.$joueur["poids"].'&v9='.$joueur["poste_prefere"].'
                ">✎</a>
                <a href="./joueurs.php?idsupp='.$joueur["Id_joueur"].'">🗑</a>
            </div>


        </div>

        ';
    }
?>

