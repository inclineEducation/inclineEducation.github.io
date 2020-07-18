<?php
    session_start();
    echo var_dump($_SESSION);
    if (array_key_exists("user", $_SESSION)){
        foreach ($_SESSION["payload"] as $key => $value){
            echo "<p>".$key.": ".$value."</p>";
        }
    } else {
        echo "<p>NOT SIGNED IN</p>";
    }
?>