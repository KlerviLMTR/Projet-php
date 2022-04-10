<?php

    

if (
    //!EMPTY et pas ISSET (Isset ne bloquait pas l'import de l'image dans le systeme de fichiers)
    !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['licence'])
    && !empty($_POST['dateN']) && !empty($_POST['taille']) && !empty($_POST['poids'])
    && !empty($_POST['poste'])
) {

    //Sauvegarde de l'image actuelle du joueur si un Id a été renseigné (si on est dans le cas d'une modif)
    if (!empty($_POST['Id_joueur'])){
        
    }

    if (empty($_POST['Id_joueur']) && !empty($_FILES['image']['tmp_name'])){
        //Si l'ID joueur n'est pas renseigné, on entre un nouveau joueur dans la BDD:
        
            //Etape 1 : vérifier que la photo respecte les critères d'import :
            $fichier_cible = est_photo_ok();

            //Etape 2 : vérifier que l'image s'importe bien dans le système de fichiers
            if (move_uploaded_file($_FILES['image']['tmp_name'], $fichier_cible)) {
                echo "Votre image a bien été importée.";

                //Etape 3 : insérer toutes les données en BDD
                $sql = "insert into JOUEUR (nom, prenom, numero_licence, date_naissance, chemin_photo, taille, poids, poste_prefere)
            values (:nom, :prenom, :licence, :dateN, :photo, :taille, :poids, :poste)";

                $donnees = [
                    'nom' => $_POST['nom'],
                    'prenom' => $_POST['prenom'],
                    'licence' => $_POST['licence'],
                    'dateN' => $_POST['dateN'],
                    'photo' => '../../photos/' . $_FILES['image']['name'],
                    'taille' => $_POST['taille'],
                    'poids' => $_POST['poids'],
                    'poste' => $_POST['poste']
                ];

                $decl = $pdo->prepare($sql);
                $decl->execute($donnees);
                header("Location: ../joueurs/joueurs.php");

            }
            //Si l'import a échoué, afficher un message
             else {
                echo "Une erreur est survenue durant l'import";
            }
        }


    //Si un ID joueur est déjà renseigné, on effectue un update du joueur concerné :
    elseif(isset($_POST['Id_joueur'])){

        $donnees_modif = [
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'licence' => $_POST['licence'],
            'dateN' => $_POST['dateN'],
            'taille' => $_POST['taille'],
            'poids' => $_POST['poids'],
            'poste' => $_POST['poste'],
            'id_joueur' => $_POST['Id_joueur']
            ];

        $modifier_sql = "update joueur 
            set joueur.nom = :nom,
            joueur.prenom = :prenom,
            joueur.numero_licence = :licence,
            joueur.date_naissance = :dateN,
            joueur.taille = :taille,
            joueur.poids = :poids,
            joueur.poste_prefere = :poste 
            where joueur.Id_joueur = :id_joueur";

        // Si une nouvelle photo est envoyée, on modifie l'ancienne
        if(!empty($_FILES['image']['tmp_name'])){
            $sql_id_joueur = 'select chemin_photo from joueur where Id_joueur = :id_joueur;';
            $donnee_photo =[
                            'id_joueur' => $_POST['Id_joueur']
            ];

            $decl = $pdo -> prepare($sql_id_joueur);
            $decl -> execute($donnee_photo);
            $chemin_img_tab = $decl -> fetchAll();

            foreach ($chemin_img_tab as $ligne){
                $chemin_img = $ligne['chemin_photo'];
                unlink($chemin_img);
            }
        
            //Etape 1 : vérifier que la photo respecte les critères d'import 
            $fichier_cible = est_photo_ok();

            //Etape 2 : vérifier que l'image s'importe bien dans le système de fichiers
            if (move_uploaded_file($_FILES['image']['tmp_name'], $fichier_cible)) {
                echo "Votre image a bien été importée.";
        
            //Etape 3 : insérer toutes les données en BDD

            $donnees_modif += ['photo' => '../../photos/' . $_FILES['image']['name']];
        
            $modifier_sql = "update joueur 
            set joueur.nom = :nom,
            joueur.prenom = :prenom,
            joueur.numero_licence = :licence,
            joueur.date_naissance = :dateN,
            joueur.chemin_photo = :photo,
            joueur.taille = :taille,
            joueur.poids = :poids,
            joueur.poste_prefere = :poste 
            where joueur.Id_joueur = :id_joueur";
            }
            //Si l'import a échoué, afficher un message
            else {
                echo "Une erreur est survenue durant l'import";
                $photo_nok;
            }
        }

        if(!isset($photo_nok)){
            $decl = $pdo -> prepare($modifier_sql);
            $decl -> execute($donnees_modif);
            header("Location: ../joueurs/joueurs.php");
        }           
    } 
}

    
        //FONCTION : VERIFIER QUE LA PHOTO EST CORRECTE 
        function est_photo_ok(){

            //Le dossier des photos est situé dans le dossier parent aux pages php
           $dest_image = "../../photos/";
           $fichier_cible = $dest_image . basename($_FILES['image']['name']);
           $uploadOk = 1;
           $extension_img = strtolower(pathinfo($fichier_cible, PATHINFO_EXTENSION));

           //Vérif image existe déjà
           if (file_exists($fichier_cible)) {
               echo "Une image de même nom existe déjà";
               $uploadOk = 0;
           }

           //Vérif taille fichier (2Mo max)
           if ($_FILES['image']['size'] > 2000000) {
               echo "Votre image ne doit pas dépasser 2Mo";
               $uploadOk = 0;
           }

           //Autoriser les fichiers de type image uniquement
           if (
               $extension_img != "jpg" && $extension_img != "png" && $extension_img != "jpeg"
               && $extension_img != "bmp"
           ) {
               echo "Les seules extensions autorisées sont : .jpg, .jpeg, .bmp, .png";
               $uploadOk = 0;
           }

           //Vérifier le statut du booléen pour importer l'image
           if ($uploadOk == 0) {
               echo "Votre image n'a pas pu être importée.";
           } 
           return $fichier_cible;
       }
       //FIN FONCTION VERIF IMAGE
