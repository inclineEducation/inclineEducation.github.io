<?php
    require_once "Mail.php";

    $from = "Website Contact Form <education.incline@gmail.com>";
    $to = "Roy Du <roy.du@inclineedu.org>";
    $subject = "hi";
    $body = "body";

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
        echo("<p>" . $mail->getMessage() . "</p>");
       } else {
        echo("<p>Message successfully sent!</p>");
       }

    mail('zeleidu@gmail.com', 'test', 'test test test');
?>