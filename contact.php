
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Incline Education - Contact Us</title>
  <meta name="keywords" content="incline,education,mentorship,panel,discussions,secondary,education,school,
  post,high,students,teachers,parents,community,advancing,charity,blog,university,panel">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="navpage" content="contact" />

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

  <!-- React Scripts
  <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
  <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  <script src="./updates/contact-us.js" type = "text/babel"></script>
  <script src = "./updates/testimonial.js" type = "text/babel"></script> -->

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

  <?php include $_SERVER['DOCUMENT_ROOT']."/components/headCommon.html"?>
</head>

<body>

<?php include "components/navbar.html" ?>
  <!-- END header -->

  <div class="slider-item overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('images/group.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center text-center">
        <div class="col-lg-12 col-sm-12">
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="">Contact Us</h1>
          <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><a href="index">Home</a> <span class="mx-3">/</span> Contact</p>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section">
    <div class="container">
      <div class="row mb-5">

        <div class="col-12 mb-5 order-2">
		  <!-- add action="#" to change redirect after submitting-->
          <form name="contact" method="POST" action="/api/contact" onsubmit="return required()">
            <div class="row">
            
              <div class="col-md-6 form-group">
                <label for="name">Name</label>
                
                <input name="name" type="text" id="name" class="form-control " placeholder = "Masli Sunria">
              </div>
              <div class="col-md-6 form-group">
                <label for="phone">Phone</label>
                <input name="phone" type="text" id="phone" class="form-control " placeholder = "604 555 0194">
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
  
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="email">Email<span style="color: red";>*</span></label>
                <input name="email" type="email" id="email" class="form-control " placeholder = "Masli.Sunria@gmail.com" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group">
                <label for="message">Write Message<span style="color: red";>*</span></label>
                <textarea name="message" id="message" class="form-control " cols="30" rows="8" required></textarea>
              </div>
			      </div>
            <div class="row" style="justify-content: center;">
              <div class="col-md-4 form-group">
                <div class="g-recaptcha" data-sitekey="6LeeorIZAAAAAK5qG2Htekytn_dbu2UZMqW_rccS"></div>
              </div>
              <div class="col-md-4 form-group">
                <input type="submit" value="Send Message" class="btn btn-outline-black px-3 py-3">
              </div>
            </div>
          </form>
        </div>
        <script>
        function required()
        {
          var recaptcha = $("#g-recaptcha-response").val();
          if (recaptcha === "") {
              event.preventDefault();
              alert("Are you a robot?");
          }
        }
        </script>
      </div>

      <div class="row">
        <div class="col-12 contact-form-contact-info">
          <div class="row">
		  <!---
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="">
              <p class="d-flex">
                <span class="ion-ios-location icon mr-5"></span>
                <span>34 Street Name, City Name Here, United States</span>
              </p>
            </div>
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
              <p class="d-flex">
                <span class="ion-ios-telephone icon mr-5"></span>
                <span>+1 242 4942 290</span>
              </p>
            </div>
			--->
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <p class="d-flex">
                <span class="ion-android-mail icon mr-5"></span>
                <span style="margin-left:-0.5em ;"><a href="mailto:contact@inclineedu.org"target="_blank" style="font-size:15px;">contact@inclineedu.org</a></span>
              </p>
            </div>
			<div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <p class="d-flex">
                <span class="icon-social-facebook icon mr-5"></span>
                <span style="margin-left:-0.5em ;"><a href="https://www.facebook.com/incline.education/" style="font-size: 18px;">@incline.education</a></span>
              </p>
            </div>
			<div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <p class="d-flex">
                <span class="icon-social-instagram icon mr-5"></span>
                <span style="margin-left:-0.5em ;"><a href="https://www.instagram.com/incline_education/" style="font-size: 18px;">@incline_education</a></span>
              </p>
            </div>
			<div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
              <p class="d-flex">
                <span class="icon-social-linkedin icon mr-5"></span>
                <span style="margin-left:-0.5em ;"><a href="https://www.linkedin.com/company/inclineeducation/" style="font-size: 18px;">Incline Education</a></span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id = "Testimonials"></div>
  <!-- END .block-4 -->
  </div>

  <!-- already on the contact page lol
  <div class="bg-primary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h3 class="text-white mb-2 font-weight-normal" data-aos="fade-right" data-aos-delay="">Let's do more together</h3>
          <p class="text-white mb-4" data-aos="fade-right" data-aos-delay="100">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            
          <p class="mb-0" data-aos="fade-right" data-aos-delay="200"><a href="contact.html" class="btn btn-outline-white px-4 py-3">Get In Touch!</a></p>
        </div>
      </div>

    </div>
  </div>
  -->

  

  <?php include "components/footer.html" ?>

  <!-- loader -->
  <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div>

  <?php include "./components/commonScripts.html" ?>
  <script src='https://www.google.com/recaptcha/api.js'></script>
  
</body>

</html>