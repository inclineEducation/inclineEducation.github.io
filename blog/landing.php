<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class post {
  public $title;
  public $subtitle;
  public $authorFirst;
  public $authorLast;
  public $URI;
  public $date;
  public $dateString;

  function __construct($title = 'unset', $subtitle = 'unset', $authorFirst = 'unset', $authorLast = 'unset',
                      $URI='unset', $date = '1969-04-20'){
    $this->$title = $title;
    $this->$subtitle = $subtitle;
    $this->$authorFirst = $authorFirst;
    $this->$authorLast = $authorLast;
    $this->$URI = $URI;
    $this->$date = date_create($date);
    $this->dateString = date_format('F d, Y');
  }

  function getHTML(){
    return <<<TEXT
      <div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
        <a href= "p/$URI">
            <h1>$title</h1>
            <h2>$subtitle</h2>
        </a>
            <p><em>Posted by $authorFirst $authorLast on $dateString</em></p>
      </div>
      <hr style="margin-top: 2rem; margin-bottom: 2rem;">
    TEXT;
  }
}

//MySQL details
$servername="localhost";
$username = "client";
$password = "Fl@pdc@4@%rJ";

$conn = new mysqli($servername, $username, $password);
$blogTable = $conn->query("SELECT * FROM inclineeducation.blog");
$conn->close();





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Incline Education</title>
  <meta name="keywords" content="incline,education,mentorship,panel,discussions,secondary,education,school,
  post,high,students,teachers,parents,community,advancing,charity,blog,university,panel">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="navpage" content="services">
  
  <link rel="shortcut icon" href="ftco-32x32.png">

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
    h1 {
        margin-bottom: 1rem!important;
        font-weight: 500;
        font-size: 2.75rem;
        line-height: 100%;
        color: inherit;
    }
    h2 {
        font-weight: 100;
        font-size: 1.75rem;
        line-height: 100%;
        margin-bottom: 1rem;
        color: inherit;
    }
    a{
        color: black;
    }
    a:hover{
        color: #ffc107;
    }
</style>


</head>

<body>
<?php include "../components/navbar.html" ?>
  <!-- END header -->
  

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('/images/group.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center text-center">
        <div class="col-lg-12 col-sm-12">
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="">Blog</h1>
		  <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><a href="/index">Home</a> <span class="mx-3">/</span> Blog</p>
        </div>
      </div>
    </div>
  </div>

  <?php
  while ($row = $blogTable->fetch_assoc()) {
    $blogpost = new post($row['title'], $row['subtitle'], $row['authorFirstName'], $row['authorLastName'], $row['URI'], $row['date']);
    echo $blogpost->getHTML;
  }
  ?>
  
  <div class="section portfolio-section" style="padding-bottom: 4em; padding-top: 4em;">
    <div class="container justify-content-center" style="width: calc(50vw);min-width:100px;">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-25" style="padding: 1em;">

      <div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
        <a href= "p/Avoid_the_checklist_extracurriculars">
            <h1>Avoid The Checklist Extracurriculars</h1>
            <h2>
              Why you should not have to sacrifice doing what you love to pursue your dream career.
            </h2>
        </a>
            <p>
                <em>Posted by Ella Chan on June 29th, 2020</em>
            </p>
      </div>
      <hr style="margin-top: 2rem; margin-bottom: 2rem;">

      <div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
        <a href= "p/women_in_economics">
            <h1>Women in Economics</h1>
            <h2>
              Never Stop Fighting for What You Believe in
            </h2>
        </a>
            <p>
                <em>Posted by Anushka Gupta on June 22th, 2020</em>
            </p>
      </div>
      <hr style="margin-top: 2rem; margin-bottom: 2rem;">
		
			<div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
        <a href= "p/a_day_in_the_life_of_an_engineering_student">
            <h1>A Day in the Life of an Engineering Student</h1>
            <h2>
              Make These the Best 4 Years of Your Life
            </h2>
        </a>
            <p>
                <em>Posted by Andy Chung on June 15th, 2020</em>
            </p>
      </div>
      <hr style="margin-top: 2rem; margin-bottom: 2rem;">

          <div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
            <a href= "p/navigating_first_year_engineering_for_aspiring_female_engineers">
                <h1>Navigating First Year Engineering For Aspiring Female Engineers</h1>
                <h2>
                  Tips to help you get through the toughest engineering workloads and schedules.
                </h2>
            </a>
                <p>
                    <em>Posted by Michelle Lin on June 8th, 2020</em>
                </p>
          </div>
          <hr style="margin-top: 2rem; margin-bottom: 2rem;">
		  
		  <div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
        <a href= "p/A_Step_By_Step_Guide_to_Getting_a_Research_Position">
            <h1>A Step-By-Step Guide to Getting a Research Position</h1>
            <h2 >
              Learn how you can join an academic research project with little to no experience.
            </h2>
        </a>
            <p>
                <em>Posted by Christopher Ng on June 1st, 2020</em>
            </p>
      </div>
      <hr style="margin-top: 2rem; margin-bottom: 2rem;">

          

        </div>
      </div>
    </div>
  </div>

  
<!--Services-->

<?php include "../components/services.html" ?>

<?php include "../components/testimonials.html" ?>

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

  <?php include "../components/footer.html" ?>
  <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div> 

  <?php include "../components/commonScripts.html" ?>

</body>
</html>