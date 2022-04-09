<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css-scss/template.css">
    <link rel="stylesheet" href="../../css-scss/polices.css">

    <link rel="stylesheet" href="../../css-scss/form_joueur.css">

</head>
<body>

    <?php
        include_once('../config.php');
        include_once('formulaire_requetes.php');
        include_once('modifier_joueur.php');
    ?>

    <!-- HEADER -->
    <nav>
        <a href="../index.php" id="lien-logo">
            <img src="../../images-deco/logo.svg" id="logo" alt="logo Tutshill Tornados">
        </a>

        <div id="nav_cont">
            <a href="../joueurs/joueurs.php" class ="lien-nav">
                <img src="../../images-deco/people.svg"class="icone" alt="icone joueurs">
                <p>Joueurs</p>
            </a>

            <a href="../match/matchs.php" class ="lien-nav">
                <img src="../../images-deco/agenda.svg"class="icone" alt="icone matchs">
                <p>Matchs</p>
            </a>
            <a href="" class ="lien-nav">
                <img src="../../images-deco/leaderboard.svg"class="icone" alt="icone stats">
                <p>Statistiques</p>
            </a>

            <a href="" class ="lien-nav">
                <img src="../../images-deco/logout.svg"class="icone" alt="icone logout">
                <p>Se déconnecter</p>
            </a>
        </div>

    </nav>

    <div id="main_cont">
        <main>
            <?php
                if (isset($_GET['v1'])){
                    echo '<h1>Modifier un joueur :</h1>';
                }
                else{
                    echo '<h1>Ajouter un joueur : </h1>';
                
                }
            
            ?>
            <hr id="main_sep">
            <form action="./formulaire.php" enctype="multipart/form-data" method="POST" id="form">

                    <label for="nom" id="labN">Nom :</label>
                    <input class="champ" type="text" name="nom" id="chN" minlength="2" maxlength ="50" 
                    <?php
                        pr_nom();
                    ?>
                    >

                
                    <label for="prenom" id="labPr">Prénom :</label>
                    <input class="champ" type="text" name="prenom" id="chPr"  minlenght="2" maxlength="50"
                    <?php
                        pr_prenom();
                    ?>
                    >
                

               
                    <label for="licence" id="labL">Numéro de licence :</label>
                    <input class="champ" type="tel" name="licence" maxlength="8"  id="chL" minlength="8"
                    <?php
                        pr_licence(); 
                    ?>
                    >
                

                    <label for="dateN" id="labD">Date de naissance :</label>
                    <input class="champ" input type="date" name="dateN" id="chD"
                     <?php   pr_dateN();
                    ?>>
                    
                

                    <label for="taille" id="labT">Taille :</label>
                    <input class="champ" type="tel" name="taille" id="chT" minlength="2" maxlength="3" 
                    <?php
                        pr_taille();
                    ?>
                    >

                    <label for="poids" id="labP">Poids :</label>
                    <input class="champ" type="tel" name="poids" id="chP" minlength="2" maxlength="3" 
                    <?php
                        pr_poids();
                    ?>
                    >


                    
                        <p id ="labPos">Poste préféré :</p>

                            <div id ="radA">
                                <input type="radio" name="poste" value="Attrapeur"
                                <?php
                                    pr_poste_att();
                                ?>
                                >
                                <label for="Attrapeur">Attrapeur</label>
                            </div>

                            <div id ="radP">
                                <input type="radio" name="poste" id="radP" value="Poursuiveur"
                                <?php
                                    pr_poste_pours();
                                ?>
                                >
                                <label for="Poursuiveur" class="poste">Poursuiveur</label>
                            </div>

                            <div id="radB">
                                <input type="radio" name="poste" class="poste" value="Batteur"
                                <?php
                                    pr_poste_batt();
                                ?>
                                >
                                <label for="Batteur" class="poste">Batteur</label>
                            </div>

                            <div id="radG">
                                <input type="radio" name="poste" class="poste" value="Gardien"
                                <?php
                                    pr_poste_gard();
                                ?>
                                >
                                <label for="Gardien" class="poste">Gardien</label>
                            </div>
                    
                    
                    
                        
                        <?php if(isset($_GET["v6"])){ echo '
                            <label for="image" id="titre_img">Image actuelle :</label>
                            <img src="' . $_GET["v6"] . '" width="150px" height="200px" id="img" alt="Portrait">
                            <label for="image" class="impimg">Importer une nouvelle image :</label>';} 
                            else{
                                echo '<label for="image" class="impimg">Importer une image :</label>';
                            }?>
                        <label id="boutonimp">Choisir une photo
                            <input type="file"  name="image">
                        </label>
              

                

                <input type="text" hidden name="Id_joueur"
                <?php
                    pr_id();
                ?>
                >
                <a href="../joueurs/joueurs.php" id="annuler">
                            <button>Annuler</button>
                </a>

                <input type="submit" id="valider" value="Enregistrer">
            </form>
        
        </main>
    </div>

    <?php
        include("../footer.php");
    ?>

</body>
</html>