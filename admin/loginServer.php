<?php
    session_start();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    echo '<p>post data: '.var_dump($_POST).'</p>';
    $CLIENT_ID = '378721043768-shk5urkcr6k66c4buk39h2sracd8iuhg.apps.googleusercontent.com';
    if (!empty(count($_POST))) {
      $token = htmlspecialchars($_POST['token']);
        
      require_once '../vendor/autoload.php';

      $client = new Google_Client(['client_id' => $CLIENT_ID]);
      $client->setAuthConfig('client_secret_378721043768-shk5urkcr6k66c4buk39h2sracd8iuhg.apps.googleusercontent.com.json');
      $payload = $client->verifyIdToken($token);
      echo "<p>$payload</p>";
      if ($payload) {
        $_SESSION["user"] = $payload;
        $_SESSION["token"] = $token;
        $userid = $payload['sub'];
        foreach ($payload as $key => $value){
            echo "<p>".$key.": ".$value."</p>";
        }
        echo "success";
        echo var_dump($payload);
        // If request specified a G Suite domain:
        $domain = $payload['hd'];
        $email = strtolower($payload['email']);

        $login = json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT']."/misc/mysql_login.json"), true);
        $conn = new mysqli($login['server'], $login['username'], $login['password']);

        //TEST IF USER EXISTS
        $user = $conn->query("SELECT * FROM inclineeducation.users WHERE email = $email");
        if ( mysqli_num_rows($user) >= 1 ){
        // LOGIN
          $user = $user.fetch_assoc();
          $_SESSION["authlevel"] = $user['access'];
        } else {
          //TODO: CREATE NEW USER
          $access = ($domain == 'inclineedu.org' ? '5': '0');
          $conn->query("INSERT INTO `inclineeducation`.`users` (`uuid`,`email`, `access`, `team`) VALUES ((SELECT UUID()),'$email', '$access', '0')");
          $_SESSION["authlevel"] = 0;
        }
        
        if ($domain == 'inclineedu.org'){
            echo '<p>Incline Education Email Signed In<p>';
            $_SESSION["authLevel"] = 5;
        }
      } else {
        // Invalid ID token
        echo "failed";
      }
    }
?>