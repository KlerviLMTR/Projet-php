<?php
        $sql_att = 'select joueur.Id_joueur, joueur.nom, joueur.prenom from joueur where joueur.statut = "Actif" and poste_prefere="Batteur";';
       
        $decl = $pdo->prepare($sql_att);
        $decl -> execute();

        $res = $decl -> fetchAll();

        foreach($res as $ligne){
                echo '<option value="'.$ligne['Id_joueur'].'" label = "'.$ligne['nom'].' '.$ligne['prenom'].'">';
        }
        
?>