<?php

    function verification_session() {
        session_start();
        if ($_SESSION["connecte"] != "oui") {
            header("location:../index.php");
        }
    }

?>