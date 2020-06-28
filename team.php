
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Incline Education - Team</title>
  <meta name="keywords" content="incline,education,mentorship,panel,discussions,secondary,education,school,
  post,high,students,teachers,parents,community,advancing,charity,blog,university,panel">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="navpage" content="team" />
  
  <link href="https://fonts.googleapis.com/css?family=DM+Serif+Display:400,400i|Roboto+Mono&display=swap" rel="stylesheet">
  <link rel="icon" href="images/favicon.png">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">


  <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

  <!-- Theme Style -->
  <link rel="stylesheet" href="css/style.css">

  <!-- React Scripts -->
  <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  <script src = "./updates/team-members.js" type="text/babel"></script>
  <script src = "./updates/advisors.js" type="text/babel"></script>
  <script src = "./updates/testimonial.js" type="text/babel"></script>

  <!-- JQuery Source -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158958448-1"></script>
  <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
	
  gtag('config', 'UA-158958448-1');
  </script>
  
</head>

<body>

  <?php include "components/navbar.html" ?>
  <!-- END header -->

  <div class="slider-item overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('images/group.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center text-center">
        <div class="col-lg-12 col-sm-12">
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="">Meet our team</h1>
		  <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><a href="index.html">Home</a> <span class="mx-3">/</span> Team</p>
          <!-- <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><a href="index.html">Home</a> <span class="mx-3">/</span> About</p> -->
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 order-md-2" data-aos="fade-up" data-aos-delay="100">
          <figure class="img-dotted-bg">
            <img src="images/hero_2.jpg" alt="Image" class="img-fluid">
          </figure>
        </div>
        <div class="col-md-5 mr-auto" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title"><strong>Creativity</strong> is our DNA</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, quos, adipisci aliquid similique
            saepe ipsa minus maxime alias libero nam quis officia eum impedit. At quisquam reprehenderit cum hic enim?</p>
          <p>Necessitatibus eligendi molestias similique tempore, optio nobis numquam temporibus debitis cum aspernatur,
            eius, nihil soluta sapiente enim. </p>
        </div>
      </div>
    </div>
  </div> -->
  
  <div class="section" style="padding-bottom: 0;">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title" id="core">The People Behind Incline Education</h2>
        </div>
      </div>
      <div class="row">
          <div id = "team"></div>
          
      </div>
      <hr style="width: 70%; border-top: 3px double; margin-top: 5em; margin-bottom: 5em;" id="advisors">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title">Advisors</h2>
        </div> 
      </div> 
      <div class="row">
        <div id = "advisor_list"></div>
      </div>
    </div>
  </div>
  <!-- END section -->

  
  <!-- END .block-4 -->
  </div>

  <?php include "/components/services.html" ?>
  
  <div id = "Testimonials"></div>
  <div class="bg-primary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h3 class="text-white mb-2 font-weight-normal" data-aos="fade-right" data-aos-delay="">What can we do to help <strong>you?</strong></h3>
          <!--
		  <p class="text-white mb-4" data-aos="fade-right" data-aos-delay="100">text here</p>
		  -->
          <p class="mb-0" data-aos="fade-right" data-aos-delay="200"><a href="contact.html" class="btn btn-outline-white px-4 py-3">Get In Touch!</a></p>
        </div>
      </div>

    </div>
  </div>



  <?php include "components/footer.html" ?>

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div>

        
  <?php include "./components/commonScripts.html" ?>
</body>

</html>