<?php
    $login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
    $conn = new mysqli($login['server'], $login['username'], $login['password']);

    if (array_key_exists("id", $_GET)){
        $id = $_GET['id'];
        $post=$conn->query("SELECT * FROM inclineeducation.blog WHERE id = ".$id);
        if (mysqli_num_rows($post) == 1) {
            $row = $post->fetch_assoc();
            $title = $row['title'];
            $subtitle = $row['subtitle'];
            $firstName = $row['authorFirstName'];
            $lastName = $row['authorLastName'];
            $date = $row['date'];
            $content = $row['content'];
        }else{
            $title = "";
            $subtitle = "";
            $firstName = "";
            $lastName = "";
            $date = "";
            $content = "";
        }
    }else{
        $title = "";
        $subtitle = "";
        $firstName = "";
        $lastName = "";
        $date = "";
        $content = "";

        /*TODO: implement creation of new blog pages instead of editing pages*/
        $id = "420blazeit";
    }

?>

<html lang="en">
    <!--APPEND .PHP TO SUBMITHTML WHEN IN DEVELOPMENT ENVIRONMENT-->
    <form method="post" id="postdata" action="submitHTML">
        <?php
        echo <<< FORM
        <table style="margin:auto;">
            <tr>
            <th><input name="title" type="text" placeholder="Title" value="$title" style="width:90vw; font-size:3rem;"></th>
            </tr>
            
            <tr>
            <th><input name="subtitle" type="subtitle" placeholder="Subtitle" value="$subtitle" style="width:90vw; font-size:2rem;"></th>
            </tr>

            <tr>
            <th><input name="firstName" type="text" placeholder="First Name" value="$firstName" style="width:30vw;">
            <input name="lastName" type="text" placeholder="Last Name" value="$lastName" style="width:30vw;">
            <input name="date" type="date" placeholder="date" value="$date" style="width:29vw;"></th>
            </tr>

            <tr>
            <th><textarea id="string" name="content" placeholder="Content" style="width: 90vw; height:70vh; margin:auto;">$content</textarea></th>
            </tr>

            <tr>
            <th><input type="submit"></th>
            </tr>
        </table>

        <input name="id" type="hidden" value="$id">
FORM;
?>
    </form>
</html>