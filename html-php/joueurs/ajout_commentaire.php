<?php
include_once('../config.php');
if(!empty($_POST['commentaires'])){
    $ajout_commentaire = 'UPDATE joueur SET commentaires =:commentaires WHERE Id_joueur=:id';
    $decl = $pdo->prepare($ajout_commentaire);
    $decl->execute(array('commentaires'=>$_POST['commentaires'],'id'=>$_POST['joueur']));
    header('Location: ./joueurs.php');
}else{
    header('Location: ./commentaires_joueur.php?id='.$_POST['joueur']);   
}

?>