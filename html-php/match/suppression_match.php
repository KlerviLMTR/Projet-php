<?php
    if(isset($_GET["idsupp"])){

        $donnees=[
            'id_m' => $_GET["idsupp"]
        ];

        //SUPPRESSION DU MATCH DANS LA BDD
        $suppr_sql = 'delete from match_ where match_.Id_match_= :id_m ;';
        $decl = $pdo -> prepare($suppr_sql);
        $decl -> execute($donnees);

    }

?>