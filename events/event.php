<?php
class Person {
  public $name = 'N/A';
  public $description = 'N/A';
  public $image = 'N/A';
  public $school = 'N/A';
  public $faculty = 'N/A';
  public $link = 'N/A';
  public $delay = 'N/A';

  function __construct($iname = 'no name', $idescription = 'no description', $ischool = 'no school', $ifaculty = 'no faculty',
            $iimage = '"no image"', $ilink = 'no link', $idelay = '100'){
    $this->name = $iname;
    $this->description = $idescription;
    $this->image = $iimage;
    $this->link = $ilink;
    $this->delay = $idelay;
    $this->school = $ischool;
    $this->faculty = $ifaculty;
  }

  function output() {
    echo $this->getHtml();
  }

  function getHtml(){
    return <<<PERSON
    <div class="col-lg-4 mb-5" data-aos="fade-up" data-aos-delay=$this->delay style="margin-left: auto; margin-right: auto">
      <div class="media d-block text-center">
        <div class="media-custom">
        <a href=$this->link target = "_blank"><img src=$this->image alt=$this->name class="img-fluid"></img></a>
        </div>
        <div class="media-body">
          <h3 class="mt-0 mb-0 text-black">$this->name</h3>
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
  public $location = 'N/A';
  public $signupLink = 'N/A';
  public $eventType = 'N/A';

  function __construct($iname = 'no name', 
                        $idescription = 'no description', 
                        $idate = 'no date',
                        $istartTime = 'no start time',
                        $iendTime = 'no end time',
                        $ilocation = 'no location',
                        $isignup = 'no signup link',
                        $itype = 'no event type'){
    $this->name = $iname;
    $this->description = $idescription;
    $this->date = $idate;
    $this->startTime = $istartTime;
    $this->endTime = $iendTime;
    $this->location = $ilocation;
    $this->signupLink = $isignup;
    $this->eventType = $itype;
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
  while ($row = $teamTable->fetch_assoc()) {
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
  $row = $eventTable->fetch_assoc();
  $event = new Event(
    $row['name'],
    $row['description'],
    date('d/m/Y',strtotime($row['startTime'])) == date('d/m/Y',strtotime($row['endTime'])) ? date('F jS, Y',strtotime($row['startTime'])) : 'starts and ends on different days',
    date('g:ia',strtotime($row['startTime'])),
    date('g:ia',strtotime($row['endTime'])),
    $row['location'],
    $row['signupLink'],
    $row['eventType'],
    $row['eventType']
  );

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
          <br>
          <p data-aos="fade-up" data-aos-delay="200" style="text-align: center;"><a href="<?php echo $event->signupLink ?>" class="btn btn-title" style="text-decoration: none;">Sign Up!</a></p>
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
                    <h1><?php echo $event->name ?></h1>
                </th>
                </tr>

                <tr data-aos="fade-right" data-aos-delay="" style="text-align:center;">
                <td style="width: 33%">
                    <p><b><?php echo $event->date ?></b></p>
                </td>
                <td style="width: 33%">
                    <p><b><?php echo "$event->startTime - $event->endTime" ?></b></p>
                </td>
                <td style="width: 33%">
                    <p><b><?php echo $event->location ?></b></p>
                </td>
                </tr>

                <tr>
                <td colspan="3" data-aos="fade-right">
                    <?php echo $event->description ?>
                </td>
                </tr>
                <tr>
                    <td colspan="3" data-aos="fade-right">
                        <p style="text-align: center;"><a href="<?php echo $event->signupLink ?>" class="btn btn-outline-black">Sign up for this event!</a></p>
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
            $panelists->output();
            ?>

        </div>
        <!--END PANELISTS-->

        <div class="row justify-content-center mb-5" style="margin-top: 3rem;">
            <div class="col-md-8 text-center" data-aos="fade-up">
            <p style="text-align: center;"><a href="<?php echo $event->signupLink ?>" class="btn btn-outline-black">Sign up for this event!</a></p>
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