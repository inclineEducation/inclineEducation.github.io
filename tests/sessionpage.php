<?php
    session_start();
    foreach ($_SESSION["payload"] as $key => $value){
        echo "<p>".$key.": ".$value."</p>";
    }
?>