<?php
    if (!array_key_exists('r', $_GET)){
        include($_SERVER['DOCUMENT_ROOT']."/404.php");
        exit();
    }

    //MySQL details
    $login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);

    //connect to MySQL
    $conn = new mysqli($login['server'], $login['username'], $login['password']);
    $sourceurl = $_GET['r'];

    //fetch destination URL, and redirect.
    $desturl = $conn->query("SELECT desturl FROM inclineeducation.redirects WHERE sourceurl = '$sourceurl'")->fetch_assoc()['desturl'];
    $conn->close();
    header("Location: $desturl");
?>