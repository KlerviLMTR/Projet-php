<?php
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/form_joueur.css">
<link rel="stylesheet" href="../../css-scss/form_matchs.css">';
include_once('../nav.php');
include_once("../config.php");
include_once("./fonctions_match.php");


requete_match_formulaire($pdo);
?>
<div id="main_cont">


    <main>
        <h1>
            <?php
                if (isset($_GET['v1'])){
                    echo'Modifier un match :';

                    $req="select * from match_ where Id_match_ =:id";
                    $decl = $pdo->prepare($req);
                    $decl->execute(array('id'=>$_GET['v1']));
                    $match=$decl->fetchAll();
                }
                else{
                        echo 'Ajouter un match : ';
                }
                
            ?>
        </h1>
        <hr id="main_sep">

        <form action="./match_formulaire.php" enctype="multipart/form-data" method="POST" id="form">

        <label for="date" id="labD">Date du match :</label>
            <input type="date" id="chD" class="champ" name="date"
                <?php
                if(isset($match)){
                    pr_date_match($match);
                }
                
                ?>
            >
            <br>
            <label for="heure" id="labH" >Heure du match :</label>
            <input type="time" id="chH" class="champ" name="heure"
                <?php
                if(isset($match)){
                pr_heure_match($match);
                }
                ?>
            >
            <br>
            <label for="equipe_adverse" id="labE">Equipe adverse :</label>
            <input type="text" id="chE"name="equipe_adverse"class="champ"  maxlength="30"
                <?php
                if(isset($match)){
                pr_equipe_adverse($match);
                }
                ?>
            >
            <br>
            <label id="labL">Lieu de rencontre : </label>
            <div id="radD">
                <input type="radio" id="radD" name="lieu_rencontre" value="Domicile"
                    <?php
                    if(isset($match)){
                    pr_lieu_match_dom($match);
                    }
                    ?>
                >
                <label for="Domicile" >Domicile</label>
            </div>
            <br>
            <div id="radE">
                <input type="radio" name="lieu_rencontre" value="Exterieur"
                    <?php
                    if(isset($match)){
                    pr_lieu_match_ext($match);
                    }
                    ?>
                >
                <label for="Exterieur">Exterieur</label>
            </div>
            <br>
            <input type="text" hidden name="Id_match"
                <?php
                if(isset($match)){
                pr_id_match($match);
                }
                ?>
            >
            <a href="./matchs.php" id="annuler">
                            <button>Annuler</button>
            </a>
            <input type="submit" id="valider" value="valider">
            </form>


    </main>
</div>

<?php
    include_once("../footer.php");
?>
</body>

</html>