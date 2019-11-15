<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php
        include 'config.php'; //holds api key
        echo '<meta name="google-signin-client_id" content="'.$CLIENT_ID.'">';
    ?>
</head>

<style>
    .google-button {
        position: absolute; 
        top: 17px; 
        right: 20px;
      }

</style>

<body>

<li><a href="" onclick="twitterShare()" >SHARE</a></li>
<script>
    function twitterShare(){
        var url = "https://twitter.com/intent/tweet?url="+window.location.toString().replace(/\?/gi,"%3F").replace(/=/gi,"%3D").replace(/%20/gi,"%2520");
        //alert(url);
        window.open(url, '',width=600,height=300);
    }
</script>
<li><div id="sign-in" class="g-signin2 google-button" data-onsuccess="sign"></div>


<!--------------------------------------------------------
hotfix for signout button to look like signin button
---------------------------------------------------------->
<a href="#" id="sign-out"  onclick="sign('');" style="display: none;height:36px;width:120px; position:absolute;top:17px;right:20px;" class="abcRioButton abcRioButtonLightBlue">
    <div class="abcRioButtonContentWrapper" style="position:absolute;top:0px;right:0px;">
        <div class="abcRioButtonIcon" style="padding:8px">
            <div style="width:18px;height:18px;" class="abcRioButtonSvgImageWithFallback abcRioButtonIconImage abcRioButtonIconImage18">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="18px" height="18px" viewBox="0 0 48 48" class="abcRioButtonSvg">
            <g><path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
            <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
            <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
            <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
            <path fill="none" d="M0 0h48v48H0z"></path></g></svg>
            </div>
        </div>
        <span style="font-size:13px;line-height:34px;" class="abcRioButtonContents">
            <span id="not_signed_ino2ldjj120ba7" style="color:black;">Sign out</span>
        </span>
    </div>
</a></li>

<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type = "text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
<script type="text/javascript">
function sign(googleUser){
    if(googleUser == ''){
        signOut();
        document.getElementById("sign-in").style.display = "block";
        document.getElementById("sign-out").style.display = "none";
    }else{
        onSignIn(googleUser);
        document.getElementById("sign-in").style.display = "none";
        document.getElementById("sign-out").style.display = "block";
    }
}

function onSignIn(googleUser) {
// for database 
    var profile = googleUser.getBasicProfile();
    var userID = profile.getId();
    var userIDString = String(userID);
    var data = {
                username: userIDString
            };
    var username_send = "username.php?username="+String(userID);
    $.post('username.php', {use:userID}, function (data){
        if(!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
     });
} 
</script>


<script type="text/javascript">
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut();
    var username = 'Anon1';
    $.post('username.php', {use:username}, function (data){
        if(!window.location.hash) {
            window.location = window.location + '#loaded';
            window.location.reload();
        }
    });

  }
</script>
</body>


</html>
