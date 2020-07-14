<?php
    $token = htmlspecialchars($_POST['token']);
    $sestoken = $_SESSION['token'];
    if ($_SESSION['token'] == $token){
        session_unset();
        session_destroy();
        echo "logged out";
    } else {
        echo "token doesnt match";
        echo "expected: $token";
        echo "got: $sestoken";
    }
?>