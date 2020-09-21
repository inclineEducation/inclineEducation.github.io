<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/admin/components/autoLogin.php";

//connect to MySQL
$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
$conn = new mysqli($login['server'], $login['username'], $login['password']);

$posts = $conn->query("SELECT title, URI FROM inclineeducation.blog ORDER BY id DESC");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Landing - Incline Admin</title>
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
      <div class="row mb-5 justify-content-center">
        <div class="col-md-25 text-center">
            <!--CONTENT-->
            <form method="get" id="editBlog" action="editBlog">
                <div class="form-group">
                   <input type="radio" id="new" name="action" value="new" required>
                   <label for="new">New</label>
                   <input type="radio" id="edit" name="action" value="edit" required>
                   <label for="edit">Edit</label>
                </div>

                <div class="form-group" id="editGroup">
                    <label for="editTitle">Blog Post:</label>
                    <select id="editTitle" name="URI" style="max-width:90vw;" required>
                        <option hidden disabled selected value> -- select an option -- </option>
                        <?php
                            while ($row = $posts->fetch_assoc()) {
                                echo '<option value='.$row["URI"].'>'.$row["title"].'</option>';
                            }
                        ?>
                    </select>
                </div>

                <input type="submit" value="Next">

            </form>
        </div>
      </div>
    </div>
  </div>

  <?php include $_SERVER['DOCUMENT_ROOT']."./components/footer.html" ?>
  <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div> 

        
  <?php include $_SERVER['DOCUMENT_ROOT']."/components/commonScripts.html" ?>
    <script>
        $("#new").change(function(){
            if ($(this).is(':checked')){
              console.log("Blog Post Selector Hidden");
              $('#editGroup').hide();
              $('#editTitle').removeAttr('required');
              $('#editTitle').val("");
            }
        });
        $("#edit").change(function(){
            if ($(this).is(':checked')){
              console.log("Blog Post Selector Shown");
              $('#editGroup').show();
              $('#editTitle').attr('required', '');
            }
        });
        
        $( document ).ready(function() {
          if ($("#edit").is(':checked')){
            console.log("Blog Post Selector Shown");
            $('#editGroup').show();
            $('#editTitle').attr('required', '');
          } else {
            console.log("Blog Post Selector Hidden");
            $('#editGroup').hide();
            $('#editTitle').removeAttr('required');
            $('#editTitle').val("");
          }
        });
    </script>

</body>
</html>