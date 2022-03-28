<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once('../config.php'); 
        if(isset($_GET['idmatch'])){
            echo 'Ajout d\'une sélection pour le match '.$_GET["idmatch"].'<br><br>';
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

<form action="./validation_selection.php" method="POST">
    

    <h2>SELECTIONNEZ LES GARDIENS</h2>
    
        <?php
        foreach($gardiens as $g){
            echo $g['nom'].$g['prenom'].'';
            echo '<select name="gardiens[]" id="">';
            echo '<option></option>';
            echo '<option value="'.$g['Id_joueur'].'|1">titulaire</option>';
            echo '<option value="'.$g['Id_joueur'].'|0">remplaçant</option>';
            echo '</select></br>';
        }
        ?>
    <h2>SELECTIONNEZ LES BATTEURS</h2>
        <?php
        foreach($batteurs as $b){
            echo $b['nom'].$b['prenom'].'';
            echo '<select name="batteurs[]" id="">';
            echo '<option></option>';
            echo '<option value="'.$b['Id_joueur'].'|1">titulaire</option>';
            echo '<option value="'.$b['Id_joueur'].'|0">remplaçant</option>';
            echo '</select></br>';
        }
        ?>
    <h2>SELECTIONNEZ LES POURSUIVEURS</h2>
        <?php
        foreach($poursuiveurs as $p){
            echo $p['nom'].$p['prenom'].'';
            echo '<select name="poursuiveurs[]" id="">';
            echo '<option></option>';
            echo '<option value="'.$p['Id_joueur'].'|1">titulaire</option>';
            echo '<option value="'.$p['Id_joueur'].'|0">remplaçant</option>';
            echo '</select></br>';
        }
        ?>
    <h2>SELECTIONNEZ LES ATTRAPEURS</h2>
        <?php
        foreach($attrapeurs as $p){
            echo $p['nom'].$g['prenom'].'';
            echo '<select name="attrapeurs[]" id="">';
            echo '<option></option>';
            echo '<option value="'.$p['Id_joueur'].'|1">titulaire</option>';
            echo '<option value="'.$p['Id_joueur'].'|0">remplaçant</option>';
            echo '</select></br>';
        }
        ?>
    <input type="text" name="idmatch" hidden <?php echo 'value="'.$_GET['idmatch'].'"'?> id="">
    <input type="submit" value="valider la sélection">
</form>


</body>
</html>