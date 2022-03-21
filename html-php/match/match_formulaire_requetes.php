<?php
    
    // Vérifier que tous les champs ont été saisis
    if(!empty($_POST['date']) && (!empty($_POST['heure']) && !empty($_POST['equipe_adverse']) 
    && !empty($_POST['lieu_rencontre']))){
        
        //Cas de la modif : le champ caché "id_match" est renseigné

        if (!empty($_POST['Id_match'])){
            $sql_modif = "UPDATE match_ SET date_match = :date, heure_match = :heure, equipe_adverse = :equipe_adv, lieu = :lieu WHERE Id_match_ = :id" ;
            
            $donnees =  [
                        'date' => $_POST['date'],
                        'heure' => $_POST['heure'],
                        'equipe_adv' => $_POST['equipe_adverse'],
                        'lieu' => $_POST['lieu_rencontre'],
                         'id' => $_POST[('Id_match')]
            ];

            $decl = $pdo -> prepare($sql_modif);
            $decl -> execute($donnees);
            echo 'modifOk';
        }
        else {
            $sql = "insert into match_ (date_match, heure_match, equipe_adverse, lieu) values ( :date, :heure ,:equipe_adv, :lieu);";
            
            $donnees = [
                'date' => $_POST['date'],
                'heure' => $_POST['heure'],
                'equipe_adv' => $_POST['equipe_adverse'],
                'lieu' => $_POST['lieu_rencontre']
            ];

            $decl = $pdo -> prepare($sql);
            $decl -> execute($donnees);
            $res = $decl -> fetchall();
            
            echo $_POST['date'];
            echo $_POST['heure'];


            foreach($res as $ligne){
                echo 'coucou';
            }

        }
}

?>