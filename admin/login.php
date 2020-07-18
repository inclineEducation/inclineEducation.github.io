<?php
session_start();
  if (array_key_exists("user", $_SESSION)){
    header("Location: landing.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Log In - Incline Admin</title>
  <meta name="keywords" content="incline,education,mentorship,panel,discussions,secondary,education,school,
  post,high,students,teachers,parents,community,advancing,charity,blog,university,panel">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link rel="shortcut icon" href="/ftco-32x32.png">

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
  <meta name="google-signin-scope" content="profile email">
  <meta name="google-signin-client_id" content="378721043768-shk5urkcr6k66c4buk39h2sracd8iuhg.apps.googleusercontent.com">
  <script src="https://apis.google.com/js/platform.js" async defer></script>
</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT']."/components/adminNavbar.html" ?>
  <!-- END header -->

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('/images/color/069_069_069.jpg'); height:80px; min-height: 80px">
    
  </div>

  
  <div class="section portfolio-section" style="height:100vh;">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-25 text-center">
            <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>

            <!--APPEND .php TO BACKEND WHEN IN DEV ENVIRONMENT-->
            <form method="post" id="postdata" action="loginServer">
            <input id="posttoken" type="hidden" name="token" value="unset">
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
      var id_token;
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log(JSON.stringify(profile));
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        
        

        // The ID token you need to pass to your backend:
        id_token = googleUser.getAuthResponse().id_token;

        /* LOGIN IN FOREGROUND
        document.getElementById('posttoken').setAttribute("value", id_token);
        document.getElementById('postdata').submit();
        */
        
        var xhr = new XMLHttpRequest();
        //backend.php when in dev environment
        xhr.open('POST', 'loginServer');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          console.log('Signed in as: ' + xhr.responseText);
        };
        xhr.send('token=' + id_token);


        console.log("ID Token: " + id_token);
        <?php
          if (array_key_exists('redirect', $_GET)){
            echo 'window.location.href ="'.$_GET['redirect'].'";';
          } else {
            echo 'window.location.href ="/admin/landing";';
          }
        ?>
      }
      
      function signOut() {
        gapi.auth2.getAuthInstance().signOut().then(function(){
          var xhr = new XMLHttpRequest();
          //logout.php when in dev environment
          xhr.open('GET', 'logout?t=' + Math.random());
          xhr.onload = function() {
            console.log('logout: ' + xhr.responseText);
          };
          xhr.send();
        })

        document.querySelector('#name').innerText = 'Not Signed In';
      }
    </script>

</body>
</html>