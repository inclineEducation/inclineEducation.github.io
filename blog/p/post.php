<?php
$login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
$conn = new mysqli($login['server'], $login['username'], $login['password']);
$URI = $_GET['p'];
$post=$conn->query("SELECT * FROM inclineeducation.blog WHERE URI = '$URI'");
if (mysqli_num_rows($post) == 1) {
    $row = $post->fetch_assoc();
    $title = $row['title'];
    $subtitle = $row['subtitle'];
    $firstName = $row['authorFirstName'];
    $lastName = $row['authorLastName'];
    $date = $row['date'];
    $content = $row['content'];
}else{
    $title = "";
    $subtitle = "";
    $firstName = "";
    $lastName = "";
    $date = "";
    $content = "";
}
$dateString = date_format(date_create($date), 'F dS, Y');
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

<link rel="stylesheet" href="css/blogpage.css">


</head>

<body>
<?php include "../../components/navbar.html" ?>
  <!-- END header -->

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('../i/2/title.jpg'); height: calc(60vh); min-height: 400px;">
    <div class="container">
      <div class="row slider-text align-items-center justify-content-left text-left titleText" style="height: calc(60vh); min-height: 400px;">
        <div class="col-lg-12 col-sm-12">
          <?php
          echo <<< TEXT
          <h1 data-aos="fade-up" style="font-size:calc(1.75rem + 0.75vw);">$title</h1>
          <h2 data-aos="fade-up" style="color: white; font-size: calc(1rem + 1vw);">$subtitle</h2>
          <p data-aos="fade-up" style="font-size: calc(0.6rem + 0.25vw);"><em>Posted by $firstName $lastName on $dateString</em></p>
TEXT;
          ?>
        </div>
      </div>
    </div>
  </div>
  
  <div class="section portfolio-section" style="padding-bottom: 4em; padding-top: 2em;">
    <div class="container justify-content-center" style="width: calc(30rem + 30vw);max-width:calc(90vw);">
      <div class="row mb-5 justify-content-center">
        <div class="col-md-25" style="padding: 1em;" data-aos="fade-left" data-aos-offset="-200">
          
        <?php echo $content; ?>

        </div>
      </div>
    </div>
  </div>

  
<!--Services-->

<?php include "../../components/services.html" ?>

<?php include "../../components/testimonials.html" ?>

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

  <?php include "../../components/footer.html" ?>
  <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div> 

  <!-- Go to www.addthis.com/dashboard to customize your tools -->
  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e5df286bd353a30"></script>

  <script src="/js/element-updates.js"></script>
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="/js/popper.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  <script src="/js/owl.carousel.min.js"></script>
  <script src="/js/jquery.waypoints.min.js"></script>
  <script src="/js/jquery.fancybox.min.js"></script>
  <script src="/js/jquery.stellar.min.js"></script>
  <script src="/js/aos.js"></script>
  <script src="/js/main.js"></script>
</body>
</html>