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
        include_once('./selection_match_util.php');

        if (isset($_POST['attrapeurs'])){
            include_once('./selection_match_util.php');
            foreach($res as $ligne){
                echo $ligne['nom']." ".$ligne['prenom']." est actif";
            }
        }
    ?>
<form action="" method="POST">
    <input list="joueurs" name="attrapeurs">
    
    <input type="text" maxlength="4">
        <datalist id="joueurs">
            <option value="Harry">
            <option value="tutu">
            <option value="toto">
        </datalist>

    <input type="submit">
</form>


</body>
</html>