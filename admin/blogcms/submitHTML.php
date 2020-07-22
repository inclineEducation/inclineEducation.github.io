<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$authLevel = $_SERVER['REMOTE_ADDR'] == '127.0.0.1' ? 5 : (array_key_exists("authLevel", $_SESSION) ? $_SESSION["authLevel"] : 0);
if ($authLevel >= 5){
    include($_SERVER['DOCUMENT_ROOT']."/src/filterText.php");

        $login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
        $conn = new mysqli($login['server'], $login['username'], $login['password']);

        $title = $conn->real_escape_string($_POST['title']);
        $subtitle = $conn->real_escape_string($_POST['subtitle']);
        $firstName = $conn->real_escape_string($_POST['firstName']);
        $lastName = $conn->real_escape_string($_POST['lastName']);
        $date = $conn->real_escape_string($_POST['date']);
        $content = $_POST['content'];

        $id = $_POST['id'];
        $status = $_POST['status'];
        
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
        $content = $conn->real_escape_string($content);

        echo $contentDOM->saveHTML();
    if ($_POST['n']){
        $uri = $_POST['URI'];
        echo "NEW";
        $result = $conn->query("SELECT * FROM inclineeducation.blog WHERE (URI='$uri')");
        if (mysqli_num_rows($result) == 0){
            echo "<p>Updating SQL</p>";
            if ($conn->query("INSERT INTO inclineeducation.blog 
                        (`title`, `subtitle`, `authorFirstName`, `authorLastName`, `URI`, `date`, `content`, `live`)
                        VALUES ('$title', '$subtitle', '$firstName', '$lastName', '$uri', '$date', '$content', '$status')
                        ")){
                            echo "success";
                        }else{
                            echo "command: INSERT INTO inclineeducation.blog 
                            (`title`, `subtitle`, `authorFirstName`, `authorLastName`, `URI`, `date`, `content`, `live`)
                            VALUES ('$title', '$subtitle', '$firstName', '$lastName', '$uri', '$date', '$content', '$status')";
                            echo "failed";
                        }
        }else{
            echo "<p>URI ALREADY EXISTS</p>";
        }
        
    }else{
        /*
        $content = $conn->real_escape_string(
            trim(
                preg_replace(
                    '/\s\s+/', ' ', $_POST['content']
                    )
                )
            );
            */


        /*
        $content = $conn->real_escape_string(
            trim(
                preg_replace(
                    '/\s\s+/', ' ', $content
                    )
                )
            );
            */


        $conn->query("UPDATE inclineeducation.blog 
                        SET 
                            title = '$title', subtitle = '$subtitle', 
                            authorFirstName = '$firstName', 
                            authorLastName = '$lastName', 
                            `date` =  '$date', 
                            content = '$content' ,
                            live = '$status' 
                        WHERE 
                            (`id` = '$id')"
                        );
    }
}else{
   echo "oops you're not logged in";
}

?>