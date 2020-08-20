<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/admin/components/autoLogin.php";
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
            $uri = $row['URI'];
            $live = $row['live'];
            $new = false;
            //This needs to be changed once titleimage field is added.
            $titleImage = $row['titleImage'] ? $row['titleImage'] : "/blog/i/$id/title.jpg";
        }else{
            echo "error";
            $title = "";
            $subtitle = "";
            $firstName = "";
            $lastName = "";
            $date = date('Y-m-d');
            $content = "";
            $uri = "";
            $id = "";
            $new = true;
        }
    } else if ($_GET['action'] == 'edit'){
        $uri=filter_var($_GET['URI'], FILTER_SANITIZE_URL);
        $post=$conn->query("SELECT * FROM inclineeducation.blog WHERE URI = '".$uri."'");
        if (mysqli_num_rows($post) == 1) {
            $row = $post->fetch_assoc();
            $title = $row['title'];
            $subtitle = $row['subtitle'];
            $firstName = $row['authorFirstName'];
            $lastName = $row['authorLastName'];
            $date = $row['date'];
            $content = $row['content'];
            $id = $row['id'];
            $live = $row['live'];
            $new = false;
            //This needs to be changed once titleimage field is added.
            $titleImage = $row['titleImage'] ? $row['titleImage'] : "/blog/i/$id/title.jpg";
        }else{  /* edit without valid URI or ID -> redirect to new */
            echo "error";
            $title = "";
            $subtitle = "";
            $firstName = "";
            $lastName = "";
            $date = date('Y-m-d');
            $content = "";
            $uri = "";
            $id = "";
            $new = true;
            //This needs to be changed once titleimage field is added.
        }
    }
    else{   /* New blog article */
        $title = "";
        $subtitle = "";
        $firstName = "";
        $lastName = "";
        $date = date('Y-m-d');
        $content = "";
        $uri = "";
        $id = "";
        $new = true;

        /*TODO: implement creation of new blog pages instead of editing pages*/
        /* done lol ezpz*/
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

<title>Landing - Incline Admin</title>
<meta name="keywords" content="incline,education,mentorship,panel,discussions,secondary,education,school,
post,high,students,teachers,parents,community,advancing,charity,blog,university,panel">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link href="https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet">
<link rel="icon" href="/images/favicon.png">

<link rel="stylesheet" href="/css/animate.css">
<link rel="stylesheet" href="/css/owl.carousel.min.css">
<link rel="stylesheet" href="/css/jquery.fancybox.min.css">

<link rel="stylesheet" href="/fonts/ionicons/css/ionicons.min.css">
<link rel="stylesheet" href="/fonts/fontawesome/css/font-awesome.min.css">
<link rel="stylesheet" href="/fonts/flaticon/font/flaticon.css">
<link rel="stylesheet" href="/css/aos.css">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

<!-- Theme Style -->
<link rel="stylesheet" href="/css/style.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-158958448-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-158958448-1');
</script>

<style>

.CodeMirror {
    width: 90vw;
    text-align: left;
    height: 70vh;
}

::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
  color: #404040;
  opacity: 1; /* Firefox */
}

:-ms-input-placeholder { /* Internet Explorer 10-11 */
  color: #404040;
}

::-ms-input-placeholder { /* Microsoft Edge */
  color: #404040;
}

input {
    background-color: #202020;
    color: #808080;
    border: 0px solid black;
    padding: 3px;
    text-align: center
}
input:focus{
    color: white;
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

.CodeMirror-focused{
    outline: 5px auto white;
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
<body>
<!--APPEND .PHP TO SUBMITHTML WHEN IN DEVELOPMENT ENVIRONMENT-->
<div style="background-color: #2a2a2a">
<p>
    <?php echo "id: $id";?>
</p>
<form method="post" id="postdata" action="submitHTML">
    <?php
    $uriField = $new ? '<input id="uri" name="URI" type="text" placeholder="URI" style="font-size: 1.5rem">' : '';
    //set "Is Live" radio button things
    $liveField = isset($live) ? (
                    $live ? <<< TEXT
                    <input type="radio" id="live" name="status" value="1" required checked>
                    <label for="live">Live</label>
                    <input type="radio" id="dead" name="status" value="0" required>
                    <label for="dead">Not Live</label>
    TEXT : <<<TEXT
                    <input type="radio" id="live" name="status" value="1" required>
                    <label for="live">Live</label>
                    <input type="radio" id="dead" name="status" value="0" required checked>
                    <label for="dead">Not Live</label>
    TEXT
    ) : <<<TEXT
                <input type="radio" id="live" name="status" value="1" required>
                <label for="live">Live</label>
                <input type="radio" id="dead" name="status" value="0" required>
                <label for="dead">Not Live</label>
    TEXT;

    echo <<< FORM
    <table style="margin:auto;">
        <tr>
        <th><input id="title" name="title" type="text" placeholder="Title" value="$title" style="width:90vw; font-size:2.5rem;"></th>
        </tr>

        <tr>
        <th><input id="subtitle" name="subtitle" type="subtitle" placeholder="Subtitle" value="$subtitle" style="width:90vw; font-size:2rem;"></th>
        </tr>

        <tr>
        <th><input id="firstname" name="firstName" type="text" placeholder="First Name" value="$firstName" style="width:30vw; font-size: 1.5rem">
        <input id="lastname" name="lastName" type="text" placeholder="Last Name" value="$lastName" style="width:30vw; font-size: 1.5rem">
        <input id="date" name="date" type="date" placeholder="date" value="$date" style="width:29vw; font-size: 1.5rem"></th>
        </tr>

        <tr>
        <th>
        <textarea id="content" name="content" placeholder="Content" style="width: 90vw; height:70vh; margin:auto;">$content</textarea>
        </th>
        </tr>

        <tr>
        <th style="text-align: center">
        $uriField

        $liveField

        <input type="submit" style="font-size: 1.5rem; color: white">
        </th>
        </tr>
    </table>

    <input name="id" type="hidden" value="$id">
    <input name="n" type="hidden" value="$new">
FORM;
?>
</form>
</div>

<div id="titleImage" class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
style="background-image: url('/images/color/gradient.jpg'); height: calc(60vh); min-height: 400px;">
<div class="container">
    <div class="row slider-text align-items-center justify-content-left text-left titleText" style="height: calc(60vh); min-height: 400px;">
    <div class="col-lg-12 col-sm-12">
        <h1 id="titleP" data-aos="fade-up" style="font-size:calc(1.75rem + 0.75vw);"></h1>
        <h2 id="subP" data-aos="fade-up" style="color: white; font-size: calc(1rem + 1vw);"></h2>
        <p data-aos="fade-up" style="font-size: calc(0.6rem + 0.25vw);"><em id="metaP"></em></p>
    </div>
    </div>
</div>
</div>

<div class="section portfolio-section" style="padding-bottom: 4em; padding-top: 2em;">
<div class="container justify-content-center" style="width: calc(30rem + 30vw);max-width:calc(90vw);">
    <div class="row mb-5 justify-content-center">
    <div id="contentP" class="col-md-25" style="padding: 1em;" data-aos="fade-left" data-aos-offset="-200">
    </div>
    </div>
</div>
</div>

  
<!--Services-->

<?php include $_SERVER['DOCUMENT_ROOT']."/components/services.html" ?>

<?php include $_SERVER['DOCUMENT_ROOT']."/components/testimonials.html" ?>

   <div class="bg-primary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h3 class="text-white mb-2 font-weight-normal">Let's do more together</h3>

        
          <p class="mb-0"><a href="/contact" class="btn btn-outline-white px-4 py-3">Get In Touch!</a></p>
        </div>
      </div>

    </div>
  </div> 
<script>
    //Code Area
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

    //update author and date preview function
    function updateMeta(){
        var date = new Date($('#date').val());
        $('#metaP').html(
            'Posted by ' + 
            $('#firstname').val() + ' ' +
            $('#lastname').val() + ' on ' + 
            date.toDateString()
        );
    }

    //update preview on load
    $(window).on('load', function(){
        console.log("loaded");
        $('#titleP').html($('#title').val());
        $('#subP').html($('#subtitle').val());
        $('#contentP').html(cm.getValue());
        updateMeta();
        $('#titleImage').css("background-image", "url('<?php echo $titleImage?>')")
        
    })

    $("#title").change(function(){
        //update URI
        console.log("title change");
        $('#uri').val($(this).val().replace(/ /g,"_").replace(/[^a-zA-Z0-9\_\-]/g, ''));

        //update title preview
        $('#titleP').html($(this).val());
        });
    
    //update live preview
    cm.on("change",function(cm){
        console.log("content change");
        $('#contentP').html(cm.getValue());
    });

    //update subtitle preview
    $("#subtitle").change(function(){
        $('#subP').html($(this).val());
    });

    //update author and date preview
    $('#firstname').change(updateMeta());
    $('#lastname').change(updateMeta());
    $('#date').change(updateMeta());




</script>
<script src="/js/element-updates.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.waypoints.min.js"></script>
  <script src="/js/jquery.fancybox.min.js"></script>
  <script src="/js/jquery.stellar.min.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/main.js"></script>
</body>
</html>