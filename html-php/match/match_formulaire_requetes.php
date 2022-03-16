<?php
    
    // Vérifier que tous les champs ont été saisis
    if(!empty($_POST['date']) && (!empty($_POST['heure']) && !empty($_POST['equipe_adverse']) 
    && !empty($_POST['lieu_rencontre']))){
        
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

?>