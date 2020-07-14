<html lang="en">
  <head>
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="378721043768-shk5urkcr6k66c4buk39h2sracd8iuhg.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark"></div>
    <button onclick="signOut()">Sign Out</button>
    <div id="name">Not Signed In</div>

    <form method="post" id="postdata" action="backend">
      <input id="posttoken" type="hidden" name="token" value="unset">
    </form>

    <script>
      var id_token;
      function onSignIn(googleUser) {
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile();
        console.log(JSON.stringify(profile));
        console.log("ID: " + profile.getId()); // Don't send this directly to your server!
        console.log('Full Name: ' + profile.getName());
        console.log('Given Name: ' + profile.getGivenName());
        console.log('Family Name: ' + profile.getFamilyName());
        console.log("Image URL: " + profile.getImageUrl());
        console.log("Email: " + profile.getEmail());
        
        

        // The ID token you need to pass to your backend:
        id_token = googleUser.getAuthResponse().id_token;
        document.getElementById('posttoken').setAttribute("value", id_token);
        //document.getElementById('postdata').submit();

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'backend');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
          console.log('Signed in as: ' + xhr.responseText);
        };
        xhr.send('token=' + id_token);


        console.log("ID Token: " + id_token);
        document.querySelector('#name').innerText = profile.getGivenName();
      }
      
      function signOut() {
        gapi.auth2.getAuthInstance().signOut().then(function(){
          var xhr = new XMLHttpRequest();
          xhr.open('POST', 'logout');
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
          xhr.onload = function() {
            console.log(xhr.responseText);
          };
          xhr.send('token=' + id_token);
        })
      }
    </script>
  </body>
</html>