<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutshill Tornados</title>
    <link rel="stylesheet" href="../css-scss/template.css">
    <link rel="stylesheet" href="../css-scss/polices.css">
    <link rel="stylesheet" href="../css-scss/auth.css">


</head>
<body>


    <main>
        <!-- Authentification -->
        <form action='' method='post'>

                <div class="flex">
                    <label for="identifiant">Identifiant :</label>
                    <input type='text' name ='identifiant' class="champ"value="">
                </div>
                <div class="flex">
                    <label for="mdp">Mot de passe :</label>
                    <input type='password' name='mdp' class="champ"value="">
                </div>
                <div id="cont_val">
                <input type='submit' name ='valider' class='valider'>
                </div>
    </form>
   
   
    <?php

        session_start();

        if (isset($_POST['valider'])) {

            $identifiant = $_POST["identifiant"];
            $post_mdp = md5($_POST["mdp"]);
            $erreur = "";

            //Connexion à la BDD
            include_once('config.php');

            //Anthentification
            $req = "select * from authentification where identifiant=:identifiant and mdp =:post_mdp;";
            $res = $pdo->prepare($req);       
            $res->execute(array('identifiant' => $identifiant, 'post_mdp' => $post_mdp));
            $utilisateur = $res->fetchAll();

            if (count($utilisateur) > 0) {
                $_SESSION['connecte'] = "oui";
                header("location:./joueurs/joueurs.php"); 
            } else {
                $erreur = "<h2>Mauvais identifiant ou mot de passe.</h2>";
                echo $erreur;
            }
        }
        ?>
         </main>
</body>
</html>

               
