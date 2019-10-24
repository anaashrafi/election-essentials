<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="login_style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>

		<div class ="table">
			<ul class ="nav-tabs">
				<li><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
				<li><a href="candidates.php"> CANDIDATES </a></li>
				<li><a href="voting_info.php"> VOTER INFORMATION </a></li>
				<li><a href="user_profile.php"> MY PROFILE </a></li>
				<li class="active-tab"><a href="login.php"> LOGIN </a></li>
        <li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>
	</header>
  <br>
  <div class="title">
			<div>Election<span>Essentials</span></div>
		</div>
		<br>
		<div class="login">
				<input type="text" placeholder="username" name="user"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="button" id='authorize_button' value="Login">
				<input type="button" id='signoutButton' value="Logout">
		</div>

		<script type="text/javascript">
			// Client ID and API key from the Developer Console
			var CLIENT_ID = '22912846062-dhb6hjjdfphuh6siu7ig8huanp474u28.apps.googleusercontent.com';
			var API_KEY = 'AIzaSyDdS2VZqWBxMmx6VPHZKSGAcDlzo3tkhxg';
	  
			// Array of API discovery doc URLs for APIs used by the quickstart
			var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/gmail/v1/rest"];
	  
			// Authorization scopes required by the API; multiple scopes can be
			// included, separated by spaces.
			var SCOPES = 'https://www.googleapis.com/auth/gmail.readonly';
	  
			var authorizeButton = document.getElementById('authorize_button');
			var signoutButton = document.getElementById('signout_button');
	  
			/**
			 *  On load, called to load the auth2 library and API client library.
			 */
			function handleClientLoad() {
			  gapi.load('client:auth2', initClient);
			}
	  
			/**
			 *  Initializes the API client library and sets up sign-in state
			 *  listeners.
			 */
			function initClient() {
			  gapi.client.init({
				apiKey: API_KEY,
				clientId: CLIENT_ID,
				discoveryDocs: DISCOVERY_DOCS,
				scope: SCOPES
			  }).then(function () {
				// Listen for sign-in state changes.
				gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);
	  
				// Handle the initial sign-in state.
				updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
				authorizeButton.onclick = handleAuthClick;
				signoutButton.onclick = handleSignoutClick;
			  });
			}
	  
			/**
			 *  Called when the signed in status changes, to update the UI
			 *  appropriately. After a sign-in, the API is called.
			 */
			function updateSigninStatus(isSignedIn) {
			  if (isSignedIn) {
				authorizeButton.style.display = 'none';
				signoutButton.style.display = 'block';
			  } else {
				authorizeButton.style.display = 'block';
				signoutButton.style.display = 'none';
			  }
			}
	  
			/**
			 *  Sign in the user upon button click.
			 */
			function handleAuthClick(event) {
			  gapi.auth2.getAuthInstance().signIn();
			}
	  
			/**
			 *  Sign out the user upon button click.
			 */
			function handleSignoutClick(event) {
			  gapi.auth2.getAuthInstance().signOut();
			}
	  
		
		  </script>
	  
		  <script async defer src="https://apis.google.com/js/api.js"
			onload="this.onload=function(){};handleClientLoad()"
			onreadystatechange="if (this.readyState === 'complete') this.onload()">
		  </script>
</body>


</html>