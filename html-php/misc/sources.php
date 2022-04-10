<?php 
include_once('../session.php');
verification_session();
include_once('../header.php');
echo '<link rel="stylesheet" href="../../css-scss/template.css">
<link rel="stylesheet" href="../../css-scss/polices.css">
<link rel="stylesheet" href="../../css-scss/sources.css">';
include_once('../nav.php');

?>
    <div id="main_cont">
        <main>
            <h1>Sources des images :</h1>
            <hr id="main_sep">
            <p>
            <h2>Toutes les images utilisées sont sourcées ci-dessous : </h2>
            <p>
            La plupart des vecteurs proviennent des banques d'images ShutterStock, IconFinder et Freepiks, pour lesquelles nous disposons respectivement d'une licence standard et de droits d'usages à visée non commerciale. Certains ont été retravaillés afin d'obtenir un résultat à notre goût.</p>
            <p>Les portraits des joueurs, quant à eux, sont issus des films Harry Potter, dont les droits sont détenus par Warner Bros.</p>

            <div id="src">
                <div class="flex">
                     <h4>Cadres déco :</h4> <a href="https://www.shutterstock.com/fr/search/cadres+art+d%C3%A9co?page=3"  target="_blank">ShutterStock</a>
                </div>
                <div class="flex">
                    <h4>Logos Harry Potter :</h4> <a href="https://www.iconfinder.com/search?q=harry+potter+quidditch&license=gte__3"  target="_blank">IconFinder</a>
                </div>
                <div class="flex">
                     <h4>Logos Tutshill :</h4> <a href="https://fr.freepik.com/"  target="_blank">Freepiks</a> 
                </div>
                <div class="flex">
                     <h4>Icones diverses :</h4> <a href="https://uxwing.com/?s=software"  target="_blank">Uxwing</a>
                </div>
            </div>
        </main>
    </div>
    <?php
    include_once("../footer.php");
?>  
    
</body>
</html>