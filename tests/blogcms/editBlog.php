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
<!DOCTYPE html>
<html lang="en">
<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/codemirror.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/theme/pastel-on-dark.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/mode/htmlmixed/htmlmixed.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/mode/xml/xml.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/mode/javascript/javascript.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.55.0/mode/css/css.js"></script>
<style>
.CodeMirror {
    width: 90vw;
    text-align: left;
    height: 70vh;
}

input {
    background-color: #202020;
    color: white;
    border: 0px solid black;
    padding: 3px;
    text-align: center
}
.cm-s-pastel-on-dark.CodeMirror {
    background-color: #202020;
	color: white;
}
.cm-s-pastel-on-dark .CodeMirror-gutters {
	background: #202020;
    padding: 0 3px;
    border-right: 1px solid #2a2a2a;
}

/* width */
::-webkit-scrollbar {
  width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #202020;
  border-left: 1px solid #2a2a2a;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: #3a3a3a;
  background-image: url('/images/92508566_3452608761432437_2428323158529409024_n.jpg');
  background-repeat: repeat-y;
  background-size: contain;
}

/* Handle on hover */
/*
::-webkit-scrollbar-thumb:hover {
  background: #555;
}
*/

</style>
</head>
<body style="background-color: #2a2a2a">
<!--APPEND .PHP TO SUBMITHTML WHEN IN DEVELOPMENT ENVIRONMENT-->
<form method="post" id="postdata" action="submitHTML">
    <?php
    echo <<< FORM
    <table style="margin:auto;">
        <tr>
        <th><input name="title" type="text" placeholder="Title" value="$title" style="width:90vw; font-size:2.5rem;"></th>
        </tr>
        
        <tr>
        <th><input name="subtitle" type="subtitle" placeholder="Subtitle" value="$subtitle" style="width:90vw; font-size:2rem;"></th>
        </tr>

        <tr>
        <th><input name="firstName" type="text" placeholder="First Name" value="$firstName" style="width:30vw; font-size: 1.5rem">
        <input name="lastName" type="text" placeholder="Last Name" value="$lastName" style="width:30vw; font-size: 1.5rem">
        <input name="date" type="date" placeholder="date" value="$date" style="width:29vw; font-size: 1.5rem"></th>
        </tr>
        <tr>
        <th>
        <pre><code class="html"><textarea id="content" name="content" placeholder="Content" style="width: 90vw; height:70vh; margin:auto;">$content</textarea></code></pre>
        </th>
        </tr>


        <tr>
        <th><input type="submit" style="font-size: 1.5rem"></th>
        </tr>
    </table>

    <input name="id" type="hidden" value="$id">
FORM;
?>
</form>
<script>
    var cm = CodeMirror.fromTextArea(document.getElementById("content"),
        {
            mode : "htmlmixed",
            htmlMode: true,
            lineNumbers: true,
            lineWrapping: true,
            gutter: true,
            theme: "pastel-on-dark"
        }
    );
</script>
</body>
</html>