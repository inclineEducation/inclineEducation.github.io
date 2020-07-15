<?php
    session_start();
    if (array_key_exists("payload", $_SESSION)){
        foreach ($_SESSION["payload"] as $key => $value){
            echo "<p>".$key.": ".$value."</p>";
        }
    } else {
        echo "<p>NOT SIGNED IN</p>";
    }
?>