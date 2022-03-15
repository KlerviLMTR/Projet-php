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
        include_once('config.php');

        $sql = "select * from joueur ";
        $prep = $pdo->prepare($sql);
        $prep -> execute();
        $resultat = $prep->fetchAll();

        foreach($resultat as $joueur){
            echo '<img src ="'.$joueur['chemin_photo'].'">';
        }

        // echo '
        //     <img src="./photos/fred_weasley.jpg">
        // ';
    
    ?>


</body>
</html>