<?php
session_start();
if (array_key_exists("authLevel", $_SESSION) && $_SESSION["authLevel"] >= 5){
include($_SERVER['DOCUMENT_ROOT']."/src/filterText.php");

$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
$conn = new mysqli($login['server'], $login['username'], $login['password']);

$title = $conn->real_escape_string($_POST['title']);
$subtitle = $conn->real_escape_string($_POST['subtitle']);
$firstName = $conn->real_escape_string($_POST['firstName']);
$lastName = $conn->real_escape_string($_POST['lastName']);
$date = $conn->real_escape_string($_POST['date']);
$content = $_POST['content'];
/*
$content = $conn->real_escape_string(
    trim(
        preg_replace(
            '/\s\s+/', ' ', $_POST['content']
            )
        )
    );
    */
$id = $_POST['id'];

$contentDOM = new DOMDocument();
if ($content != ""){
    $contentDOM->loadHTML(filterText($content));
    
    // remove <!DOCTYPE 
    $contentDOM->removeChild($contentDOM->doctype);           

    // remove <html></html> 
    $contentDOM->replaceChild($contentDOM->firstChild->firstChild, $contentDOM->firstChild);

    // remove <body></body>
    $body = $contentDOM->getElementsByTagName("body")->item(0);
    $fragment = $contentDOM->createDocumentFragment();
    while ($body->childNodes->length > 0) {
        $fragment->appendChild($body->childNodes->item(0));
    }
    $body->parentNode->replaceChild($fragment, $body);
    
    foreach( $contentDOM->getElementsByTagName('script') as $href ){
        $href->parentNode->removeChild($href);
    }
    
    $content = $contentDOM->saveHTML();
}

/*
$content = $conn->real_escape_string(
    trim(
        preg_replace(
            '/\s\s+/', ' ', $content
            )
        )
    );
    */
$content = $conn->real_escape_string($content);

echo $contentDOM->saveHTML();

$conn->query("UPDATE inclineeducation.blog 
                SET 
                    title = '$title', subtitle = '$subtitle', 
                    authorFirstName = '$firstName', 
                    authorLastName = '$lastName', 
                    `date` =  '$date', 
                    content = '$content' 
                WHERE 
                    (`id` = '$id')"
                );
}else{
    echo "oops you're not logged in";
}


?>