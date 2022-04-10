<?php
    include_once('../session.php');
    include_once('../config.php');
    verification_session();

    include_once('./fonctions_joueur.php');

    if(isset($_POST['statut']) && isset($_POST['id'])){
        $nv_statut="update joueur set statut=:statut where Id_joueur=:id";
        $decl_nv=$pdo->prepare($nv_statut);
        $decl_nv->execute(array('id'=>$_POST['id'],'statut'=>$_POST['statut']));
    }

    if(!empty($_POST['commentaires_joueur'])){
        $nv_commentaire="update joueur set commentaires = :commentaire where Id_Joueur=:id";
        $stmt = $pdo->prepare($nv_commentaire);
        $stmt->execute(array('commentaire'=>$_POST['commentaires_joueur'], 'id'=>$_POST['id_joueur']));
    }

    include_once('../header.php');
    echo '<link rel="stylesheet" href="../../css-scss/template.css">
    <link rel="stylesheet" href="../../css-scss/joueurs.css">
    <link rel="stylesheet" href="../../css-scss/polices.css">';
    include_once('../nav.php');
    ?>

    <div id="main_cont">
        <main>


            <h1>Liste des joueurs :</h1>
            <hr id="main_sep">

            <div id="entete">
                <a href="../ajout_modif/formulaire.php">
                    <img src="../../images-deco/add.svg" alt="icone ajouter">
                    Ajouter un joueur</a>

                <form action="" method="POST">
                    <p>Rechercher par mots-clefs :</p>
                    <input type="text" id="champ"  name="recherche" value="<?php if(!empty($_POST['recherche'])) echo $_POST['recherche'] ?>">
                    <button><a href="./joueurs.php" id="eff">✗</a></button>
                    <input type="submit" id="val" value="✓">
                </form>
                
            </div>
            


            <?php
                //Si une recherche a été effectuée
                if(!empty($_POST['recherche'])) {
                    $sql="SELECT * FROM joueur WHERE ";
                    $symb = " ";
                    $tab = explode($symb, trim($_POST['recherche']));
                    $cpt = 1;
                    $search_data;
                    foreach($tab as $mot) {                     
                        if (!($cpt == sizeof($tab))) {
                            $sql.='UPPER(nom) like UPPER(:a'.$cpt.') OR UPPER(prenom) like UPPER(:a'.$cpt.') OR UPPER(poste_prefere) like UPPER(:a'.$cpt.') OR 
                                UPPER(statut) like UPPER(:a'.$cpt.') OR ';
                        } else {
                            $sql.='UPPER(nom) like UPPER(:a'.$cpt.') OR UPPER(prenom) like UPPER(:a'.$cpt.') OR UPPER(poste_prefere) like UPPER(:a'.$cpt.') OR 
                                UPPER(statut) like UPPER(:a'.$cpt.') order by nom';
                        }
                        $search_data['a'.$cpt] = "%$mot%";
                        $cpt++;
                    }

                    $prep = $pdo->prepare($sql);
                    $prep->execute($search_data);
                    $resultat = $prep->fetchAll(PDO::FETCH_ASSOC);

                    if (empty($resultat)) {
                        echo '<p id="null">Aucun résultat.</p><br>
                                <p id="conseil">Vous pouvez effectuer une recherche par nom, prénom, poste ou statut.</p><br>
                                ';
                    } else {                    
                        //Affichage des joueurs trouvés :
                        include_once('affichage_joueurs.php');
                    }

                } else {
                //Affichage sans recherche
                    //Vérfier si un joueur a été supprimé:
                    supprimer_joueur($pdo);

                    //Récupérer toutes les données nécessaires à l'affichage des joueurs:
                    $sql = "select * from joueur order by nom";
                    $prep = $pdo->prepare($sql);
                    $prep -> execute();
                    $resultat = $prep->fetchAll();
                
                    //Affichage des joueurs :
                    include_once('affichage_joueurs.php');
                }
                
            
            ?>
        
        </main>
    </div>
    <?php
        include("../footer.php");
    ?>



</body>
</html>