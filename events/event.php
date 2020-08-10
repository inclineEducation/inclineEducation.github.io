<?php

//404 if 'e' key is not found.
if (!array_key_exists('e', $_GET)){
  include($_SERVER['DOCUMENT_ROOT']."/404.php");
  exit();
}

class Person {
  public $name = 'N/A';
  public $description = 'N/A';
  public $image = 'N/A';
  public $school = 'N/A';
  public $faculty = 'N/A';
  public $link = 'N/A';
  public $delay = 'N/A';
  public $mod = '';

  function __construct($iname = 'no name', $idescription = 'no description', $ischool = 'no school', $ifaculty = 'no faculty',
            $iimage = '"no image"', $ilink = 'no link', $imod = false, $idelay = '100'){
    $this->name = $iname;
    $this->description = $idescription;
    $this->image = $iimage;
    $this->link = $ilink;
    $this->delay = $idelay;
    $this->school = $ischool;
    $this->faculty = $ifaculty;
    $this->mod = $imod ? '[mod]' : '';
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
          <h3 class="mt-0 mb-0 text-black">$this->name $this->mod</h3>
          <p><b>$this->school </b>∣<b> $this->faculty</b></p>
          <p>$this->description</p>
        </div>
      </div>
    </div>
    PERSON;
  }
}

class Event {
  public $name = 'N/A';
  public $description = 'N/A';
  public $date = 'N/A';
  public $startTime = 'N/A';
  public $endTime = 'N/A';
  public $startTimeMST = 'N/A';
  public $endTimeMST = 'N/A';
  public $startTimeEST = 'N/A';
  public $endTimeEST = 'N/A';
  public $location = 'N/A';
  public $signupLink = 'N/A';
  public $eventType = 'N/A';
  public $mod = 'N/A';
  public $calendarLink = null;
  function __construct($iname = 'no name', 
                        $idescription = 'no description', 
                        $istartTime = 'no start time',
                        $iendTime = 'no end time',
                        $ilocation = 'no location',
                        $isignup = 'no signup link',
                        $itype = 'no event type',
                        $imod = 'no moderator',
                        $icalendar = false){
    $this->name = $iname;
    $this->description = $idescription;
    $unixStartTime = strtotime($istartTime);
    $unixEndTime = strtotime($iendTime);
    $this->date = date('d/m/Y',$unixStartTime) == date('d/m/Y',$unixEndTime) ? date('F jS, Y',$unixStartTime) : 'starts and ends on different days';
    $this->startTime = date('g:ia',$unixStartTime);
    $this->endTime = date('g:ia',$unixEndTime);
    $this->startTimeMST = date('g:ia',$unixStartTime+3600);
    $this->endTimeMST = date('g:ia',$unixEndTime+3600);
    $this->startTimeEST = date('g:ia',$unixStartTime+10800);
    $this->endTimeEST = date('g:ia',$unixEndTime+10800);
    $this->location = $ilocation;
    $this->signupLink = $isignup;
    $this->eventType = $itype;
    $this->mod = $imod;
    $this->calendarLink = $icalendar;
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

  function addBeginning($person){
    array_unshift($this->people, $person);
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

$panelists = new People();

//MySQL details

$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);


//connect to MySQL
$conn = new mysqli($login['server'], $login['username'], $login['password']);

$teamTable = $conn->query("SELECT people.firstName,people.lastName,people.description,people.imageURI,people.linkedin,people.school,people.faculty
FROM inclineeducation.eventpeople link
	JOIN inclineeducation.events events
	ON link.eventID=events.eventID
	JOIN inclineeducation.people people
	ON link.UID=people.UID
WHERE URI = '".$_GET['e']."'
ORDER BY people.firstName ASC;");

$eventTable = $conn->query("SELECT *
FROM inclineeducation.events
WHERE URI= '".$_GET['e']."';");

$conn->close();


if (mysqli_num_rows($eventTable) != 0){
  $row = $eventTable->fetch_assoc();
  $event = new Event(
    $row['name'],
    $row['description'],
    $row['startTime'],
    $row['endTime'],
    $row['location'],
    $row['signupLink'],
    $row['eventType'],
    $row['moderator'],
    $row['calendarLink']
  );
  while ($row = $teamTable->fetch_assoc()) {
    if (($row['firstName'] ." ".$row['lastName']) == $event->mod){
      $panelists->addBeginning(
        new Person(
          $row['firstName'].' '.$row['lastName'],
          $row['description'],
          $row['school'],
          $row['faculty'],
          $row['imageURI'],
          $row['linkedin'],
          true
        )
      );
    } else {
      $panelists->addPerson(
        new Person(
          $row['firstName'].' '.$row['lastName'],
          $row['description'],
          $row['school'],
          $row['faculty'],
          $row['imageURI'],
          $row['linkedin'],
        )
      );
    }
  }
  
}else{
  include($_SERVER['DOCUMENT_ROOT']."/404.php");
  exit();
}
?>

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

  <?php include $_SERVER['DOCUMENT_ROOT']."/components/headCommon.html"?>

</head>

<body>
<?php include $_SERVER['DOCUMENT_ROOT']."/components/navbar.html" ?>
  <!-- END header -->

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('/images/group.jpg');">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-center text-center">
        <div class="col-lg-12 col-sm-12">
          <h1 class="mb-4" data-aos="fade-up" data-aos-delay=""><?php echo $event->name ?></h1>
          <p class="custom-breadcrumbs" data-aos="fade-up" data-aos-delay="100"><?php echo $event->date ?></p>
          <!--TODO: MAKE JOIN BTN DYNAMIC-->
          <!--TODO: CHANGE JOIN BUTTON TO WATCH BUTTON-->
          <!--
          <br>
          <p data-aos="fade-up" data-aos-delay="200" style="text-align: center;"><a href="/join" class="btn btn-title" style="text-decoration: none;">Join Us Live!</a></p>
          -->
          <br>
          <p data-aos="fade-up" data-aos-delay="200" style="text-align: center;"><a href="<?php echo $event->signupLink ?>" class="btn btn-title" style="text-decoration: none; font-size:1rem">Sign Up!</a></p>
        </div>
        <div class="col-lg-12 col-sm-12" style="position: absolute; bottom: 2rem;">
          <a class="smoothscroll" href="#top"><img src="/images/icons/scroll.png" style="max-width: 10vw; max-height: 5vh;"></a>
        </div>
      </div>
    </div>

  </div>
  <div id="top">
  </div>

  <div class="section portfolio-section" style="padding-bottom: 4em; padding-top: 2em">
    <div class="container">

        <!--EVENT INFO-->
        <div class="row mb-5 justify-content-center">
            <style>
              .tablechild{
                padding: 1.8rem 0;
                margin-bottom: 0;
              }
            </style>
            <div class="col-md-8 text-center" style="padding: 1em;">
              <h1 data-aos="fade-right" style="margin:auto"><?php echo $event->name ?></h1>
              <div class="row text-center" style="text-align:center;">
                <div class="col-lg-4 text-center" data-aos="fade-right" style="display: table; position: relative;">
                  <p class="tablechild"><b><?php echo $event->date ?></b></p>
                </div>
                <div class="col-lg-4 text-center" data-aos="fade-right" style="display: table; position: relative;">
                    <p class="mb-0"><b><?php echo $event->startTime." PST - $event->endTime"." PST" ?></b></p>
                    <p class="mb-0"><b><?php echo $event->startTimeMST." MST - $event->endTimeMST"." MST" ?></b></p>
                    <p><b><?php echo $event->startTimeEST." EST - $event->endTimeEST"." EST" ?></b></p>
                </div>
                <div class="col-lg-4 text-center" data-aos="fade-right" style="display: table; position: relative;">
                  <p class="tablechild"><b><?php echo $event->location ?></b></p>
                </div>
              </div>
              <hr>
              <div data-aos="fade-right">
                <?php echo $event->description ?>
                <p style="text-align: center;"><a href="<?php echo $event->signupLink ?>" class="btn btn-outline-black">Sign up for this event!</a></p>
                <?php
                if ($event->calendarLink){
                  echo '<a target="_blank" href="'.htmlspecialchars($event->calendarLink).'"><img border="0" src="https://www.google.com/calendar/images/ext/gc_button1_en.gif"></a>';
                }
                ?>
              </div>
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
            $panelists->output();
            ?>

        </div>
        <!--END PANELISTS-->
        
        <!--TODO: MAKE THIS DYNAMIC-->
        <!--GIVEAWAY / SPONSOR INFO-->
        <div class="row mb-5 justify-content-center" style="text-align: center;">
          <div class="col-md-12 text-center">

            <h2 class="mb-4 section-title" data-aos="fade-right" data-aos-delay="100">Giveaway Prizes</h2>
            <h3 class="mb-4 section-title" data-aos="fade-right">Sign up and attend our panel for the chance to win:</h3>
            <div class="row" style="display:flex; justify-content: center; align-items: center;"data-aos="fade-right" data-aos-delay="100">

              <div class="col-lg-4 mb-4" style="text-align:center;">
                <div style="padding-bottom: 100%; position: relative; height:100%">
                  <div style="position: absolute; top: 0; bottom: 0; width: 100%; height: 100%; display:flex; align-items:center;">
                    <img src="/images/partners/gyu_kaku.jpg" alt="Gyu Kaku Japanese BBQ" style="width: 100%; max-height: 100%; margin:auto;">
                  </div>
                </div>
                <p>Gyu Kaku Japanese BBQ Gift Vouchers</p>   
              </div>

              <div class="col-lg-4 mb-4" style="text-align:center;">
                <div style="padding-bottom: 100%; position: relative; height:100%;">
                  <div style="position: absolute; top: 0; bottom: 0; width: 100%; height: 100%; display:flex; align-items:center;">
                    <img src="/images/misc/giveaway/google_home.jpg" alt="Google Home Mini" style="width: 90%; max-height: 90%; margin:auto;">
                  </div>
                </div>
                <p>Google Home Mini</p>
              </div>

              <div class="col-lg-4 mb-4" style="text-align:center;">
                <div style="padding-bottom: 100%; position: relative; height:100%">
                  <div style="position: absolute; top: 0; bottom: 0; width: 100%; height: 100%; display:flex; align-items:center;">
                    <img src="/images/partners/lush.jpg" alt="Lush Cosmetics" style="width: 90%; max-height: 90%; margin:auto;">
                  </div>
                </div>
                <p>Lush Gift Basket</p> 
              </div>

              <div class="col-lg-4 mb-4" style="text-align:center;">
                <div style="padding-bottom: 100%; position: relative; height:100%">
                  <div style="position: absolute; top: 0; bottom: 0; width: 100%; height: 100%; display:flex; align-items:center;">
                    <img src="/images/partners/virtuous_pie.jpg" alt="Virtuous Pie" style="width: 90%; max-height: 90%; margin:auto;">
                  </div>
                </div>
                <p>Virtuous Pie Gift Card</p> 
              </div>

            </div>
          </div>
        </div>
        <!--END SPONSOR-->

        <div class="row justify-content-center mb-5" style="margin-top: 3rem;">
          <div class="col-md-8 text-center" data-aos="fade-up">
          <p style="text-align: center;"><a href="<?php echo $event->signupLink ?>" class="btn btn-outline-black">Sign up for this event!</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="section portfolio-section" style="padding-bottom: 1em;">
    <div class="container justify-content-center" style="width: calc(40rem+40vw); max-width: 90vw;">
      
    </div>
  </div>

  

<!--Services-->
  
  <style>
    .services{
      padding-top:0em;
    }
  </style>
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