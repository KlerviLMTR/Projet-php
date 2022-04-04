<?php
// echo var_dump($_SERVER);
if($_SERVER['HTTP_REFERER'] != "http://localhost/php_sport/html-php/joueurs/joueurs.php"){
    echo 'Veuillez renseigner un commentaire';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css-scss/commentaires.css">
</head>
<body>
    <h2>Commentaires joueur:</h2>

    <form action="./ajout_commentaire.php" method="POST">
        <input type="textarea" name="commentaires" id="textarea">
        <input type ="submit" value="Enregistrer">
        <input type="text" name="joueur" hidden value="<?php echo $_GET['id'];?>" id="">
        <input type="submit" value="Annuler">
    </form>
</body>
</html>