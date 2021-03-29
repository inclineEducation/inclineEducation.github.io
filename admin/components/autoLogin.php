<?php
    //This component automatically sets the user session, or redirects user to login page if no user session is found.
    if ((!array_key_exists("user", $_SESSION)) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != 'localhost'){
        header("Location: /admin/login?redirect=".$_SERVER['REQUEST_URI']);
    }
?>