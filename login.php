<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
</head>

<style>

</style>

<body>

<div id="sign-in" class="g-signin2 google-button" data-onsuccess="sign" style="position: absolute; top: 17px; right: 20px;"></div>
<a href="#" style="display: none;" id="sign-out" class="google-button" onclick="sign('');">Sign out</a>

<meta name="google-signin-client_id" content="1090701263750-v1q63mvhalk321efvnam4asc5s50oigv.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
function sign(googleUser){
    if(googleUser == ''){
        signOut();
        document.getElementById("sign-in").style.display = block;
        document.getElementById("sign-out").style.display = none;
    }else{
        onSignIn(googleUser);
        document.getElementById("sign-in").style.display = none;
        document.getElementById("sign-out").style.display = block;
    }
}


function onSignIn(googleUser) {
// for database 
} </script>


<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut();
  }
</script>
</body>


</html>
