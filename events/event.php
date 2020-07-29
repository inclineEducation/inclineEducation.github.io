<!DOCTYPE html>
<html lang="en">

<head>
  <title>Incline Education - Upcoming Events</title>
  <meta name="keywords" content="incline,education,mentorship,panel,discussions,secondary,education,school,
  post,high,students,teachers,parents,community,advancing,charity,blog,university,panel">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="navpage" content="services" />
  


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
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158958448-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
	
  gtag('config', 'UA-158958448-1');
  </script>

  <!-- React Scripts -->
  <!--
  <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  -->

  <!-- JQuery Source -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
    .btn-title{
        color: white !important;
        font-size: 2rem;
        border-radius: 5px;
        border: solid 2px white;
    }
    .btn-title:hover{
        background-color: rgba(255,193,7,0.8);
        color: white !important;
    }
  </style>

</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/components/navbar.html" ?>
  <!-- END header -->

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('/images/group.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center text-center">
        <div class="col-lg-12 col-sm-12">
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="">EVENT NAME</h1>
          <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100">EVENT DATE</p>
          <br>
          <p data-aos="fade-up" data-aos-delay="200" style="text-align: center;"><a href="/signup" class="btn btn-title" style="text-decoration: none;">Sign Up!</a></p>
        </div>
        <div class="col-lg-12 col-sm-12" style="position: absolute; bottom: 2rem;">
          <a class="smoothscroll" href="#top"><img src="/images/icons/scroll.png" style="max-width: 10vw; max-height: 5vh;"></a>
        </div>
      </div>
    </div>

  </div>
  <div id="top">
  </div>

  <div class="section portfolio-section" style="padding-bottom: 4em;">
    <div class="container">

        <!--EVENT INFO-->
        <div class="row mb-5 justify-content-center">
            <div class="col-md-25 text-center" style="padding: 1em;">
            <table style="margin:auto; width: 100%">
                <tr data-aos="fade-right" data-aos-delay="" style="text-align:center;">
                <th colspan="3">
                    <h1>EVENT TITLE</h1>
                </th>
                </tr>

                <tr data-aos="fade-right" data-aos-delay="">
                <td style="width: 33%">
                    <p>DATE</p>
                </td>
                <td style="width: 33%">
                    <p>TIME</p>
                </td>
                <td style="width: 33%">
                    <p>LOCATION</p>
                </td>
                </tr>

                <tr>
                <td colspan="3" data-aos="fade-right">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                    dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </td>
                </tr>
                <tr>
                    <td colspan="3" data-aos="fade-right">
                        <p style="text-align: center;"><a href="/signup" class="btn btn-outline-black">Sign up for this event!</a></p>
                    </td>
                </tr>
            </table>
            </div>
        </div>

        <!--PANELISTS-->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center" data-aos="fade-up">
            <h2 class="mb-4 section-title">Panelists</h2>
            </div>
        </div>

        <div class="row">
            <?php
            for ($i = 0; $i < 5; $i++){
            echo <<<TEXT
                <!--PANELIST-->
                <div class="col-lg-4 mb-5" data-aos="fade-up" style="margin-left: auto; margin-right: auto">
                <div class="media d-block text-center">
                    <div class="media-custom">
                    <a href="/people"><img src="/images/misc/hagp.jpg" alt="John Doe" class="img-fluid"></img></a>
                    </div>
                    <div class="media-body">
                    <h3 class="mt-0 text-black" style="margin-bottom: 2px;">John Doe</h3>
                    <b>
                    <p style="margin-bottom: 2px;">The University of British Columbia</p>
                    <p>Faculty of Land and Food Systems</p>
                    </b>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure 
                        dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non 
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
                </div>
TEXT;
            }
            ?>

        </div>
        <!--END PANELISTS-->

        <div class="row justify-content-center mb-5" style="margin-top: 3rem;">
            <div class="col-md-8 text-center" data-aos="fade-up">
            <p style="text-align: center;"><a href="/signup" class="btn btn-outline-black">Sign up for this event!</a></p>
            </div>
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

  <?php include $_SERVER['DOCUMENT_ROOT']."/components/footer.html" ?>
  <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div> 

        
  <?php include $_SERVER['DOCUMENT_ROOT']."/components/commonScripts.html" ?>
  <script>
    $(document).ready(function(){
    $(".smoothscroll").on('click', function(event) {

        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 500, function(){

                window.location.hash = hash;
            });
        }
    });
    });
</script>

</body>
</html>