
<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

class Person {
  public $name = 'N/A';
  public $description = 'N/A';
  public $image = 'N/A';
  public $link = 'N/A';
  public $delay = 'N/A';

  function __construct($iname = 'no name', $idescription = 'no description', 
            $iimage = '"no image"', $ilink = 'no link', $idelay = '100'){
    $this->name = $iname;
    $this->description = $idescription;
    $this->image = $iimage;
    $this->link = $ilink;
    $this->delay = $idelay;
  }

  function output() {
    echo $this->getHtml();
  }

  function getHtml(){
    return <<<PERSON
    <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay='$this->delay' style="margin-left: auto; margin-right: auto">
      <div class="media d-block text-center">
        <div class="media-custom">
        <a href='$this->link' target = "_blank"><img src='$this->image' alt='$this->name' class="img-fluid"></img></a>
        </div>
        <div class="media-body">
          <h3 class="mt-0 text-black">$this->name</h3>
          <p>$this->description</p>
        </div>
      </div>
    </div>
    PERSON;
  }
}

class People {
  public $people;
  function __construct(){
    $this->people = array();
  }

  function addPerson($person){
    $this->people[] = $person;
  }

  function addPeople($people){
    foreach ($people as $person){
      $this->addPerson($person);
    }
  }

  function output(){
    foreach ($this->people as $person) {
      $person->output();
    }
  }
}
$teamCore = new People();
$teamAdvisors = new People();

//MySQL details

$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);


//connect to MySQL
$conn = new mysqli($login['server'], $login['username'], $login['password']);
$teamTable = $conn->query("SELECT * FROM inclineeducation.team");
$advisorsTable = $conn->query("SELECT * FROM inclineeducation.advisors");
$conn->close();

while ($row = $teamTable->fetch_assoc()) {
  $teamCore->addPerson(
    new Person(
      $row['firstName'].' '.$row['lastName'],
      $row['description'],
      $row['imageURI'],
      $row['linkedin'],
    )
  );
}

while ($row = $advisorsTable->fetch_assoc()) {
  $teamAdvisors->addPerson(
    new Person(
      $row['firstName'].' '.$row['lastName'],
      $row['description'],
      $row['imageURI'],
      $row['linkedin'],
    )
  );
}


/*
$teamCore->addPeople(
  array(
    new Person(

    )
  )
);
*/

?>

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
  <!--
  <script crossorigin src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
  <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  -->


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
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay="">Meet our team</h1>
		  <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><a href="index">Home</a> <span class="mx-3">/</span> Team</p>
          <!-- <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><a href="index">Home</a> <span class="mx-3">/</span> About</p> -->
        </div>
      </div>
    </div>
  </div>
  
  <div class="section" id="core" style="padding-bottom: 0;">
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title">The People Behind Incline Education</h2>
        </div>
      </div>
      <div class="row">
          <!-- ~~~~~CORE TEAM~~~~~ -->
          <?php $teamCore->output(); ?>
          
      </div>
      <hr style="width: 70%; border-top: 3px double; margin-top: 5em; margin-bottom: 5em;" id="advisors">
      <div class="row justify-content-center mb-5">
        <div class="col-md-8 text-center" data-aos="fade-up" data-aos-delay="">
          <h2 class="mb-4 section-title">Advisors</h2>
        </div> 
      </div> 
      <div class="row">
        <!-- ~~~~~Advisors~~~~~ -->
        <?php $teamAdvisors->output(); ?>
      </div>
    </div>
  </div>
  <!-- END section -->

  
  <!-- END .block-4 -->
  </div>

  <?php include "./components/services.html" ?>
  
  <?php include "./components/testimonials.html" ?>
  <div class="bg-primary py-5">
    <div class="container text-center">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <h3 class="text-white mb-2 font-weight-normal" data-aos="fade-right" data-aos-delay="">What can we do to help <strong>you?</strong></h3>
          <!--
		  <p class="text-white mb-4" data-aos="fade-right" data-aos-delay="100">text here</p>
		  -->
          <p class="mb-0" data-aos="fade-right" data-aos-delay="200"><a href="contact" class="btn btn-outline-white px-4 py-3">Get In Touch!</a></p>
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