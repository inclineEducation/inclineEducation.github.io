<?php
    echo $_SERVER['DOCUMENT_ROOT'];
    $json = file_get_contents($_SERVER['DOCUMENT_ROOT']."\\misc\\mysql_login.json");
    echo var_dump($json);
    $decoded = json_decode($json);
    echo var_dump($decoded);
    echo $decoded->username;
?>