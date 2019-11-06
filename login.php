<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
</head>

<body>
<div class="g-signin2" data-onsuccess="onSignIn" style="position: absolute; top: 17px; right: 20px;"></div>
<meta name="google-signin-client_id" content="1090701263750-v1q63mvhalk321efvnam4asc5s50oigv.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
function onSignIn(googleUser) {
// for database 
} </script>

<a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut();
  }
</script>
</body>


</html>
