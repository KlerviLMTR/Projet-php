<?php   
        function statut($string){
            if( strcmp($string,"Actif") ==  0){
                return 'Actif';
            }
            elseif( strcmp($string,"Absent") ==  0){
                return 'Absent';

            }
            elseif( strcmp($string,"Suspendu") ==  0){
                return 'Suspendu';

            }
            elseif( strcmp($string,"Blessé") ==  0){
                return 'Blessé';
            }
        }
        
        function afficher_img($string){
            if (strcmp($string, "Poursuiveur")==0){
                return 'poursuiveur.svg';
            }
            elseif (strcmp($string, "Batteur")==0){
                return 'batteur.svg';
            }
            elseif (strcmp($string, "Attrapeur")==0){
                return 'attrapeur.svg';
            }
            elseif (strcmp($string, "Gardien")==0){
                return 'gardien.svg';
            }
        }

        function supprimer_joueur($pdo){
            if(isset($_GET["idsupp"])){

                $donnees=[
                    'id_j' => $_GET["idsupp"]
                ];
        
                // SUPPRESSION DE L IMAGE DANS LE SYSTEME DE FICHIERS
                $chemin_img_sql = 'select chemin_photo from joueur where Id_joueur=:id_j';
            
        
                $decl_img = $pdo -> prepare($chemin_img_sql);
                $decl_img -> execute($donnees);
                
                $chemin_img = $decl_img -> fetchAll();
            
        
                foreach ($chemin_img as $ligne){
                    echo $ligne['chemin_photo'];
                    unlink ($ligne['chemin_photo']);
                }
        
                //SUPPRESSION DU JOUEUR DANS LA BDD
                $suppr_sql = 'delete from joueur where joueur.id_joueur= :id_j ;';
                $decl = $pdo -> prepare($suppr_sql);
                $decl -> execute($donnees);
        
            }
        }
?>