<?php
        $sql_att = 'select joueur.nom, joueur.prenom from joueur where joueur.statut = "Actif" and poste_prefere="Attrapeur";';
       
        $decl = $pdo->prepare($sql_att);
        $decl -> execute();

        $res = $decl -> fetchAll();
        // echo 'attrapeurs tavu'.$res['nom'];
?>