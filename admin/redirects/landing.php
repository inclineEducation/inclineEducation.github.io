<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Redirect {
    public $sourceurl = '';
    public $desturl = '';
    public $author = '';

    function __construct($sourceurl = '', $desturl = '', $author = ''){
        $this->sourceurl = $sourceurl;
        $this->desturl = $desturl;
        $this->author = is_null($author) ? '4everalone' : $author;
    }

}

session_start();
include $_SERVER['DOCUMENT_ROOT']."/admin/components/autoLogin.php";

//connect to MySQL
$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
$conn = new mysqli($login['server'], $login['username'], $login['password']);

$redirectsTable = $conn->query("SELECT * FROM inclineeducation.redirects");

$redirects = array();
while ($row = $redirectsTable->fetch_assoc()){
    array_push($redirects, new Redirect(
                $row['sourceurl'],
                $row['desturl'],
                $row['author']
    ));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Redirects - Incline Admin</title>
  <meta name="robots" content="noindex">
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
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT']."/components/adminNavbar.html" ?>
  <!-- END header -->

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('/images/color/069_069_069.jpg'); height:80px; min-height: 80px">
    
  </div>

  
  <div class="section portfolio-section"  style="height:100vh;">
    <div class="container">
      <div class="row mb-5 justify-content-center text-center">
        <div class="col-md-25 justify-content-center text-center">
            <!--CONTENT-->
            <h3>Current Redirects</h3>
            <div style="overflow-y: auto; overflow-x: hidden; max-height: 70vh">
                <style>
                th {
                    border-bottom: 1px solid black;
                }
                </style>
                <hr>
                <table style="width: 90vw">
                <tr>
                    <th>Source URL</th>
                    <th>Destination URL</th>
                    <th>Author</th>
                </tr>
                <?php
                foreach($redirects as $redirect){
                    echo <<<STRING
                    <tr>
                        <td>$redirect->sourceurl</td>
                        <td>$redirect->desturl</td>
                        <td>$redirect->author</td>
                    </tr>
                    STRING;
                }
                ?>
                </table>
            </div>
            <br>
            <h3>Add new redirect</h3>
            <hr>
            <form id="redirectForm">
                <div class="row mb-1 justify-content-center text-center">
                    <div class="col-md-4 text-center mb-4">
                    <label for="sourceurl">https://inclineedu.org/r/</label>
                    <input id="sourceurl" name="sourceurl" placeholder="Source URL">
                    </div>
                    <div class="col-md-2 text-center mb-4">
                    <input id="desturl" name="desturl" placeholder="Destination URL">
                    </div>
                </div>
                <div class="row mb-5 justify-content-center text-center">
                    <div class="col-md-2 text-center mb-4">
                        <input type="submit" value="Submit">
                    </div>
                </div>
            </form>

        </div>
      </div>
    </div>
  </div>

  <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div> 

        
  <?php include $_SERVER['DOCUMENT_ROOT']."/components/commonScripts.html" ?>
    <script>
        window.addEventListener( "load", function () {
            function sendData() {
                const XHR = new XMLHttpRequest();
                const FD = new FormData( form );

                // Define what happens on successful data submission
                XHR.addEventListener( "load", function(event) {
                    if (event.target.status == 201){
                        if (alert(event.target.responseText)) {}
                        else window.location.reload();
                    } else {
                        alert(event.target.responseText);
                    }
                } );

                // Define what happens in case of error
                XHR.addEventListener( "error", function( event ) {
                alert( 'Oops! Something went wrong.' );
                } );

                // Set up our request
                XHR.open( "POST", "/admin/redirects/newredirect" );

                // The data sent is what the user provided in the form
                XHR.send( FD );
            }

        // Access the form element...
        const form = document.getElementById( "redirectForm" );

        // ...and take over its submit event.
        form.addEventListener( "submit", function ( event ) {
            event.preventDefault();
            sendData();
        } );
    } );
    </script>

</body>
</html>