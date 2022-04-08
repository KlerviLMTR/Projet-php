    <?php
    include_once('../header.php');
    echo '<link rel="stylesheet" href="../../css-scss/template.css">';
    include_once('../nav.php');
    include_once('./fonctions_selection.php');

        include_once('../config.php'); 
        if(isset($_GET['idmatch'])){
            echo 'Ajout d\'une sélection pour le match '.$_GET["idmatch"].'<br><br>';
        }else{
            header('Location: ../match/matchs.php');
        }

        $gardiens='SELECT * FROM joueur WHERE poste_prefere="Gardien" AND statut="Actif"';
        $stmt = $pdo->prepare($gardiens);
        $stmt->execute();
        $gardiens=$stmt->fetchAll();

        $batteurs='SELECT * FROM joueur WHERE poste_prefere="Batteur" AND statut="Actif"';
        $stmt = $pdo->prepare($batteurs);
        $stmt->execute();
        $batteurs=$stmt->fetchAll();

        $attrapeurs='SELECT * FROM joueur WHERE poste_prefere="Attrapeur" AND statut="Actif"';
        $stmt = $pdo->prepare($attrapeurs);
        $stmt->execute();
        $attrapeurs=$stmt->fetchAll();

        $poursuiveurs='SELECT * FROM joueur WHERE poste_prefere="Poursuiveur" AND statut="Actif"';
        $stmt = $pdo->prepare($poursuiveurs);
        $stmt->execute();
        $poursuiveurs=$stmt->fetchAll();

    ?>
<main>
    <form action="./validation_selection.php" method="POST">
        

        <h2>SELECTIONNEZ LES GARDIENS (1 de chaque)</h2>
            <?php
            selection_gardien($gardiens);
            ?>
        <h2>SELECTIONNEZ LES BATTEURS (2 de chaque)</h2>
            <?php
            selection_batteur($batteurs);
            ?>
        <h2>SELECTIONNEZ LES POURSUIVEURS (3 de chaque)</h2>
            <?php
            selection_poursuiveur($poursuiveurs);
            ?>
        <h2>SELECTIONNEZ LES ATTRAPEURS (1 de chaque)</h2>
            <?php
            selection_attrapeur($attrapeurs);
            ?>
        <input type="text" name="idmatch" hidden <?php echo 'value="'.$_GET['idmatch'].'"'?> id="">
        <input type="submit" value="valider la sélection">
    </form>
</main>

</body>
</html>