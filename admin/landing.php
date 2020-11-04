<?php
session_start();
include $_SERVER['DOCUMENT_ROOT']."/admin/components/autoLogin.php";
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

  <!--stylesheets-->
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

  
  <div class="section portfolio-section">
    <div class="container">
      <div class="row mb-5 justify-content-center" style="height:100vh;">
      <p>
      <?php echo "auth level: ".$_SESSION['authLevel'] ?>
      </p>
        <div class="col-md-25 text-center">
            <!--CONTENT-->
            <a class="btn btn-outline-black" href="/admin/blogcms/landing">Blog Editor (HTML)</a>
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

</body>
</html>