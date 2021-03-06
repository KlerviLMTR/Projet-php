<?php 
    include_once('../header.php');
    include_once('../session.php');
    verification_session();

?>
    <link rel="stylesheet" href="../../css-scss/template.css">
    <link rel="stylesheet" href="../../css-scss/polices.css">
    <link rel="stylesheet" href="../../css-scss/form_joueur.css">

</head>
<body>

    <?php
        include_once('../config.php');
        include_once('formulaire_requetes.php');
        include_once('modifier_joueur.php');
        include_once('../nav.php');
    ?>

    <div id="main_cont">
        <main>
            <?php
                if (isset($_GET['v1'])){
                    echo '<h1>Modifier un joueur :</h1>';

                    $prep=$pdo->prepare('select * from joueur where Id_joueur=:id');
                    $prep->execute(array('id'=>$_GET['v1']));
                    $joueur=$prep->fetchAll();
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
                    if(isset($joueur)) pr_nom($joueur);
                    ?>
                    >

                
                    <label for="prenom" id="labPr">Prénom :</label>
                    <input class="champ" type="text" name="prenom" id="chPr"  minlenght="2" maxlength="50"
                    <?php
                    if(isset($joueur))    pr_prenom($joueur);
                    ?>
                    >
                

               
                    <label for="licence" id="labL">Numéro de licence :</label>
                    <input class="champ" type="tel" name="licence" maxlength="8"  id="chL" minlength="8" pattern="^[0-9]{8,8}$"
                    title="Merci d'ajouter un numéro de licence composé de 8 chiffres"
                    <?php
                    if(isset($joueur))    pr_licence($joueur); 
                    ?>
                    >
                

                    <label for="dateN" id="labD">Date de naissance :</label>
                    <input class="champ" input type="date" name="dateN" id="chD"
                     <?php if(isset($joueur))   pr_dateN($joueur);
                    ?>>
                    
                

                    <label for="taille" id="labT">Taille :</label>
                    <input class="champ" type="tel" name="taille" id="chT" minlength="2" maxlength="3" pattern="^[0-9]{2,3}$"
                    title="taille en cm entre 2 et 3 chiffres"
                    <?php
                    if(isset($joueur))    pr_taille($joueur);
                    ?>
                    >

                    <label for="poids" id="labP">Poids :</label>
                    <input class="champ" type="tel" name="poids" id="chP" minlength="2" maxlength="3" pattern="^[0-9]{2,3}$"
                    title="poids en kg entre 2 et 3 chiffres"
                    <?php
                    if(isset($joueur))    pr_poids($joueur);
                    ?>
                    >


                    
                        <p id ="labPos">Poste préféré :</p>

                            <div id ="radA">
                                <input type="radio" name="poste" value="Attrapeur"
                                <?php
                                if(isset($joueur))    pr_poste_att($joueur);
                                ?>
                                >
                                <label for="Attrapeur">Attrapeur</label>
                            </div>

                            <div id ="radP">
                                <input type="radio" name="poste" id="radP" value="Poursuiveur"
                                <?php
                                if(isset($joueur))    pr_poste_pours($joueur);
                                ?>
                                >
                                <label for="Poursuiveur" class="poste">Poursuiveur</label>
                            </div>

                            <div id="radB">
                                <input type="radio" name="poste" class="poste" value="Batteur"
                                <?php
                                if(isset($joueur))    pr_poste_batt($joueur);
                                ?>
                                >
                                <label for="Batteur" class="poste">Batteur</label>
                            </div>

                            <div id="radG">
                                <input type="radio" name="poste" class="poste" value="Gardien"
                                <?php
                                if(isset($joueur))    pr_poste_gard($joueur);
                                ?>
                                >
                                <label for="Gardien" class="poste">Gardien</label>
                            </div>
                    
                    
                    
                        
                        <?php if(isset($joueur)){ echo '
                            <label for="image" id="titre_img">Image actuelle :</label>
                            <img src="' . $joueur["0"]["5"] . '" width="150px" height="200px" id="img" alt="Portrait">
                            <label for="image" class="impimg">Importer une nouvelle image :</label>';} 
                            else{
                                echo '<label for="image" class="impimg">Importer une image :</label>';
                            }?>
                        <label id="boutonimp">Choisir une photo
                            <input type="file"  name="image">
                        </label>
              

                

                <input type="text" hidden name="Id_joueur"
                <?php
                    pr_id($joueur);
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