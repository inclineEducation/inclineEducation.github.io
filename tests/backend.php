<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<p>post data: '.var_dump($_POST).'</p>';
    $CLIENT_ID = '378721043768-shk5urkcr6k66c4buk39h2sracd8iuhg.apps.googleusercontent.com';
    if (count($_POST) > 0) {
      $token = htmlspecialchars($_POST['token']);
        
      require_once '../vendor/autoload.php';

      $client = new Google_Client(['client_id' => $CLIENT_ID]);
      $client->setAuthConfig('client_secret_378721043768-shk5urkcr6k66c4buk39h2sracd8iuhg.apps.googleusercontent.com.json');
      $payload = $client->verifyIdToken($token);
      if ($payload) {
        $_SESSION["payload"] = $payload;
        $_SESSION["token"] = $token;
        $userid = $payload['sub'];
        foreach ($payload as $key => $value){
            echo "<p>".$key.": ".$value."</p>";
        }
        echo "success";
        echo var_dump($payload);
        // If request specified a G Suite domain:
        $domain = $payload['hd'];
        if ($domain == 'inclineedu.org'){
            echo '<p>Incline Education Email Signed In<p>';
        }
      } else {
        // Invalid ID token
        echo "failed";
      }
    }
?>