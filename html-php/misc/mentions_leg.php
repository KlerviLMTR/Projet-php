<?php 
include_once('../session.php');
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/mentions.css">';
include_once('../nav.php');

?>  
    <div id="main_cont">
        <main>
            <h1>Mentions légales :</h1>
            <hr id="main_sep">
            <p>Nous sommes Florianne CORREIA et Klervi LE MONTREER, deux étudiantes en DUT informatique.
             Ceci est le résultat d'un exercice pédagogique sur l'élaboration d'un site web dynamique en PHP.</p>
             <div>
                <img src="../../images-deco/logoiut.png" alt="Logo de l'iut">
            </div>
        </main>
    </div>
    <?php
    include_once("../footer.php");
?>   
</body>
</html>