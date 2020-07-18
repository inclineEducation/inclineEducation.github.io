<?php
    if ((!array_key_exists("user", $_SESSION)) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1'){
        header("Location: /admin/login?redirect=".$_SERVER['REQUEST_URI']);
    }
?>