<?php
    $token = htmlspecialchars($_POST['token']);
    if ($_SESSION['token'] == $token){
        session_unset();
        session_destroy();
        echo "logged out";
    }
?>