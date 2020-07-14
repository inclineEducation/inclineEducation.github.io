<?php
    $token = htmlspecialchars($_POST['token']);
    $sestoken = $_SESSION['token'];
    if ($sestoken == $token){
        session_unset();
        session_destroy();
        echo "logged out";
    } else {
        echo "token doesnt match\n";
        echo "expected: $token\n";
        echo "got: $sestoken";
    }
?>