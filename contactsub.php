<?php
    /*
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    */
    if (count($_POST) > 0) {
      $name = htmlspecialchars($_POST['name']);
      $email = htmlspecialchars($_POST['email']);
      $message = htmlspecialchars($_POST['message']);
      $phone = htmlspecialchars($_POST['phone']);
      if ($phone == ''){
        $phone = '<Not Provided>';
      }
      if ($name == ''){
        $name = '<Not Provided>';
      }
      $body="From: $name\nEmail: $email\nPhone: $phone\n\nMessage:\n$message";
      $subject = "Contact Form Submission From $name";
  
      require_once "Mail.php";
  
      $from = "Website Contact Form <education.incline@gmail.com>";
      $to = "Contact <contact@inclineedu.org>";
  
      $host = 'smtp.gmail.com:587';
      $username = 'education.incline@gmail.com';
      $password = 'abc123ABC123';
  
      $headers = array('from' => $from,
                      'To' => $to,
                      'Subject' => $subject);
      
      $smtp = Mail::factory('smtp',
      array ('host' => $host,
        'auth' => "LOGIN",
        'socket_options' => array('ssl' => array('verify_peer_name' => false)),
        'username' => $username,
        'password' => $password));
  
      $mail = $smtp->send($to, $headers, $body);
  
      if (PEAR::isError($mail)) {
          $mailmessage = $mail->getMessage();
         } else {
          $mailmessage = "Thank you! We have received your message!";
         }
    } else {
      $mailmessage = "OOPS a wild error appeared! Please email contact@inclineedu.org!";
    }
    
    
    header("refresh:10; /contact");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contact Form Received!</title>
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
  <?php include "./components/navbar.html" ?>
  <!-- END header -->

  <div class="slider-item innerp overlay" data-stellar-background-ratio="0.5"
    style="background-image: url('/images/color/069_069_069.jpg'); height:80px; min-height: 80px">
    
  </div>

  
  <div class="section portfolio-section">
    <div class="container">
      <div class="row mb-5 justify-content-center">
        <img data-aos="fade-right" data-aos-delay="" src="/images/brand_space/IE_B_Text.png" style="width:30vh;">
        <div class="col-md-25 text-center">
		  <h1 class="mb-4 section-title" data-aos="fade-right" data-aos-delay="" style="font-size:8vh">Contact Form Submission</h1>
		  <h2 class="mb-4 section-title" data-aos="fade-right" data-aos-delay="" style="font-size:3vh">
        <?php echo $mailmessage; ?>
      </h2>
      <h3 class="mb-4 section-title" data-aos="fade-right" data-aos-delay="" style="font-size:3vh"> You will be returned the contact page in 10 seconds </h3>

      <div data-aos="fade-right" data-aos-delay="">
        <p style="text-align: center;"><a href="/contact" class="btn btn-outline-black">Click Here to Go Back Manually</a></p>
      </div>

      
          

        </div>
      </div>
    </div>
  </div>

  <?php include "./components/footer.html" ?>
  <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
      <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
      <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
        stroke="#ffc107" /></svg></div> 

        
  <?php include "./components/commonScripts.html" ?>

</body>
</html>