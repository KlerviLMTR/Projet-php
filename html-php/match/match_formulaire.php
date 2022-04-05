<?php 
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">';
include_once('../nav.php');
include_once("../config.php");
include_once("./fonctions_match.php");
requete_match_formulaire($pdo);
?>
    <main> 
        <a href="./matchs.php">Lien pour revenir à la feuille des matchs</a>
        <form action="./match_formulaire.php" method="POST">
            <h1>Ajouter un nouveau match :</h1>
            <label for="date">Date du match :</label>
            <input type="date" name="date"
                <?php
                    pr_date_match();
                ?>
            >
            <br>
            <label for="heure">Heure du match :</label>
            <input type="time" name="heure"
                <?php
                    pr_heure_match();
                ?>
            >
            <br>
            <label for="equipe_adverse">Equipe adverse :</label>
            <input type="text" name="equipe_adverse" maxlength="30"
                <?php
                    pr_equipe_adverse();
                ?>
            >
            <br>
            <input type="radio" name="lieu_rencontre" value="Domicile"
                <?php
                    pr_lieu_match_dom();
                ?>
            >
            <label for="Domicile">Domicile</label>
            <br>
            <input type="radio" name="lieu_rencontre" value="Exterieur"
                <?php
                    pr_lieu_match_ext();
                ?>
            >
            <label for="Exterieur">Exterieur</label>
            <br>
            <input type="text" hidden name="Id_match"
                <?php
                    pr_id_match();
                ?>
            >
            <input type="submit" value="valider">

        </form>
    </main>
</body>
</html>