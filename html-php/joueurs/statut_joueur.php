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
    
?>