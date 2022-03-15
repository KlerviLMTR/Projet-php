<?php
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

?>