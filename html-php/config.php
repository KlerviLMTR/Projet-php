<?php $hote = 'localhost';
        $bdd = 'equipe_quidditch';
        $utilisateur = 'root';
        $mdp = '';

        //Guillemets importants pour toute requête SQL
        $req = "mysql:host=$hote;dbname=$bdd;charset=UTF8";

        try {
            $pdo = new PDO($req, $utilisateur, $mdp);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
?> 