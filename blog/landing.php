<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

if (array_key_exists('page', $_GET)){
  $page = htmlspecialchars($_GET['page']);
} else {
  $page = 1;
}
if (array_key_exists('postsperpage', $_GET)){
  $postsPerPage = htmlspecialchars($_GET['postsperpage']);
} else {
  $postsPerPage = 5;
}

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
    $this->title = $title;
    $this->subtitle = $subtitle;
    $this->authorFirst = $authorFirst;
    $this->authorLast = $authorLast;
    $this->URI = $URI;
    $this->date = date_create($date);
    $this->dateString = date_format($this->date, 'F d, Y');
  }

  function getHTML(){
    return <<<TEXT
      <div data-aos="fade-right" data-aos-offset="-100" class="blog-index">
        <a href= "p/$this->URI">
            <h1 style="font-size: calc(1.75rem + 2vw);">$this->title</h1>
            <h2 style="font-size: calc(1.2rem + 1vw);">$this->subtitle</h2>
        </a>
            <p><em>Posted by $this->authorFirst $this->authorLast on $this->dateString</em></p>
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
$numPosts = $conn->query("SELECT COUNT(*) FROM inclineeducation.blog")->fetch_all()[0][0];

$upperRange = $numPosts - ( ( $postsPerPage * ($page - 1) ) );
$lowerRange = $numPosts - ( $postsPerPage * ($page) - 1);

$blogTable = $conn->query("SELECT * FROM inclineeducation.blog 
                            WHERE id BETWEEN $lowerRange AND $upperRange
                            ORDER BY date DESC");

$conn->close();

$numPages = ceil ( (float) $numPosts / $postsPerPage );


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

  
  
  <div class="section portfolio-section" style="padding-bottom: 0em; padding-top: 4em;">
    <div class="container justify-content-center" style="width: calc(50vw);min-width:300px;">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-25" style="padding: 1em; width: 100%">

        <?php
        while ($row = $blogTable->fetch_assoc()) {
          $blogpost = new post($row['title'], $row['subtitle'], $row['authorFirstName'], $row['authorLastName'], $row['URI'], $row['date']);
          echo $blogpost->getHTML();
        }
        ?>

        </div>
        <div class="row mb-5 justify-content-center">
          <?php
          echo '<p style="color: black;"> page: ';
          $pagesPrinted = 0;
          if ($page - 2 > 1) {
            echo "<a href='?page=".(1)."&postsperpage=".$postsPerPage."'>".(1)."</a> ";
          }
          if ($page - 2 > 2) {
            echo ' &#8230; ';
          }
          if ($page - 2 > 0) {
            echo "<a href='?page=".($page - 2)."&postsperpage=".$postsPerPage."'>".($page - 2)."</a> ";
            $pagesPrinted ++;
          }
          if ($page - 1 > 0) {
            echo "<a href='?page=".($page - 1)."&postsperpage=".$postsPerPage."'>".($page - 1)."</a> ";
            $pagesPrinted ++;
          } 
          echo "<u>".($page)."</u> ";
          $pagesPrinted ++;
          $counter = 1;
          for (; $pagesPrinted < 5; $pagesPrinted ++, $counter ++){
            if ($page + $counter > $numPages) break;
            echo "<a href='?page=".($page + $counter)."&postsperpage=".$postsPerPage."'>".($page  + $counter)."</a> ";
          }
          if ($page + $counter < ($numPages - 1)){
            echo ' &#8230; ';
          }
          if ($page + $counter < $numPages) {
            echo "<a href='?page=".($numPages)."&postsperpage=".$postsPerPage."'>".($numPages)."</a> ";
          }

          ?>
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