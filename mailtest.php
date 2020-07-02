<?php
    require_once "Mail.php";

    $from = "test <test@inclineedu.org>";
    $to = "Roy Du <roy.du@inclineedu.org>";
    $subject = "hi";
    $body = "body";

    $host = 'smtp.gmail.com:587';
    $username = 'roy.du@inclineedu.org';
    $password = 'roy34267';

    $headers = array('from' => $from,
                    'To' => $to,
                    'Subject' => $subject);
    
    $smtp = Mail::factory('smtp',
    array ('host' => $host,
      'auth' => true,
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