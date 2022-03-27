<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutshill Tornados</title>
    <link rel="stylesheet" href="../css-scss/template.css">
</head>
<body>

    <!-- HEADER -->
    <!-- <nav>
        <a href="#" id="lien-logo">
            <img src="../images-deco/logo.svg" id="logo" alt="logo Tutshill Tornados">
        </a>

        <div id="nav_cont">
            <a href="./joueurs/joueurs.php" class ="lien-nav">
                <img src="../images-deco/people.svg"class="icone" alt="icone joueurs">
                <p>Joueurs</p>
            </a>

            <a href="./match/matchs.php" class ="lien-nav">
                <img src="../images-deco/agenda.svg"class="icone" alt="icone matchs">
                <p>Matchs</p>
            </a>
            <a href="" class ="lien-nav">
                <img src="../images-deco/leaderboard.svg"class="icone" alt="icone stats">
                <p>Statistiques</p>
            </a>

            <a href="" class ="lien-nav">
                <img src="../images-deco/logout.svg"class="icone" alt="icone logout">
                <p>Se déconnecter</p>
            </a>
        </div>

    </nav> -->

    <main>
        <!-- Authentification -->
        <form action='' method='post'>
        <fieldset>
            <legend align="left"> Connexion </legend>
            Identifiant :
            <input type='text' name ='identifiant' value="">
            <br>
            Mot de passe : 
            <input type='password' name='mdp' value="">
            <br>
            <input type='submit' name ='valider' class='button'>
        </fieldset>
    </form>
    </main>
   
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
                $erreur = "Mauvais identifiant ou mot de passe.";
                echo $erreur;
            }
        }
        ?>


  


</body>
</html>

               
