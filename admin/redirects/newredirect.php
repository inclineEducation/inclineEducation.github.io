<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
if ((!array_key_exists("user", $_SESSION)) && $_SERVER['REMOTE_ADDR'] != '127.0.0.1' && $_SERVER['REMOTE_ADDR'] != 'localhost'){
    http_response_code(401);
    exit();
}

$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
$conn = new mysqli($login['server'], $login['username'], $login['password']);
$response = '';
if(array_key_exists('user', $_SESSION) && array_key_exists('name', $_SESSION['user'])){
    $response = $conn->query("INSERT INTO `inclineeducation`.`redirects` (`sourceurl`, `desturl`, `author`) VALUES ('".$_POST['sourceurl']."', '".$_POST['desturl']."', '".$_SESSION['user']['name']."');");
} else {
    $response = $conn->query("INSERT INTO `inclineeducation`.`redirects` (`sourceurl`, `desturl`) VALUES ('".$_POST['sourceurl']."', '".$_POST['desturl']."');");
}

if ($conn->error){
    if (substr($conn->error, 0, 15) === "Duplicate entry"){
        echo "This source URL already exists!";
        http_response_code(409);
    }else{
        echo "Unknown error:<br>$conn->error";
        http_response_code(400);
    }
} else {
    echo "Redirect successfully added!";
    http_response_code(201);
}

$conn->close();


?>