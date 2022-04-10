    <?php
    include_once('../header.php');
    echo '<link rel="stylesheet" href="../../css-scss/template.css">
    <link rel="stylesheet" href="../../css-scss/polices.css">
    <link rel="stylesheet" href="../../css-scss/joueurs.css">
    <link rel="stylesheet" href="../../css-scss/ajout_selection.css">';
    include_once('../nav.php');
    include_once('./fonctions_selection.php');

    include_once('../config.php');
    

    $batteurs = 'SELECT * FROM joueur WHERE poste_prefere="Batteur" AND statut="Actif"';
    $stmt = $pdo->prepare($batteurs);
    $stmt->execute();
    $batteurs = $stmt->fetchAll();

    $attrapeurs = 'SELECT * FROM joueur WHERE poste_prefere="Attrapeur" AND statut="Actif"';
    $stmt = $pdo->prepare($attrapeurs);
    $stmt->execute();
    $attrapeurs = $stmt->fetchAll();

    $poursuiveurs = 'SELECT * FROM joueur WHERE poste_prefere="Poursuiveur" AND statut="Actif"';
    $stmt = $pdo->prepare($poursuiveurs);
    $stmt->execute();
    $poursuiveurs = $stmt->fetchAll();

    ?>
    <div id="main_cont">


        <main>
            <h1>Sélectionner des joueurs :</h1>
            <hr id="main_sep">

            <form action="./validation_selection.php" method="POST">

            <?php 
            if($_SERVER['HTTP_REFERER'] == 'http://localhost'.$_SERVER['REQUEST_URI'] || $_SERVER['HTTP_REFERER'] == 'https://localhost'.$_SERVER['REQUEST_URI']){
                echo '<p id="msgerr">La sélection entrée n\'est pas valide ! Veuillez respecter le format spécifié ci-dessous.</p>';
            }
            ?>
            
                <h2>1) SELECTIONNEZ LES GARDIENS : (1 titulaire et 1 remplaçant)</h2>
                <div class="cont_cartes">
                <?php
                selection_gardien($pdo);
                ?>
                </div>
                
                <hr class="sep">
                
                <h2>2) SELECTIONNEZ LES BATTEURS : (2 titulaires et 2 remplaçants)</h2>
                <div class="cont_cartes">
                <?php
                selection_batteur($pdo);
                ?>
                </div>
                
                <hr class="sep">
                
                <h2>3) SELECTIONNEZ LES POURSUIVEURS : (3 titulaires et 3 remplçacants)</h2>
                <div class="cont_cartes">
                <?php
                selection_poursuiveur($pdo);
                ?> 
                </div>

                <hr class="sep">
                
                <h2>4)  SELECTIONNEZ LES ATTRAPEURS : (1 titulaire et 1 remplaçant)</h2>
                <div class="cont_cartes">
                <?php
                selection_attrapeur($pdo);
                ?>
                </div>
                
                <input type="text" name="idmatch" hidden <?php echo 'value="' . $_GET['idmatch'] . '"' ?> id="">

                <div id="btn">
                    <a href="../match/matchs.php" id="annuler">
                                <button>Annuler</button>
                    </a>
                    <input type="submit" id="valider" value="Enregistrer">
                </div>
            </form>
        </main>
    </div>
        <?php
        include_once("../footer.php");
        ?>
    </body>

    </html>