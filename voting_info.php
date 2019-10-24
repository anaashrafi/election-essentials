<?php
        $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
        $user = 'duttaadri2014@gmail.com';
        $db = new PDO($dsn, $user);
        $statement = $db->prepare("use Election_Essentials;");
        $statement->execute();
        $sqlGet = "Select * from Vo_In;";
        $statement = $db->prepare($sqlGet);
        $statement->execute();
        $data = $statement->fetchAll();
        $general = $data[0]['Data1'];
        $primary = $data[1]['Data1'];






echo '
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="voting_info_style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
    <div class ="table">
			<ul class ="nav-tabs">
				<li><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
				<li><a href="candidates.php"> CANDIDATES </a></li>
				<li class="active-tab"><a href="voting_info.php"> VOTER INFORMATION </a></li>
				<li><a href="user_profile.php"> MY PROFILE </a></li>
				<li><a href="login.php"> LOGIN </a></li>
        <li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>
</header>

<div id="registration">
  <p>
    Primary Election Deadline: '.$primary.'
    <br>
    General Election Deadline: ' .$general. '
  </p>

</div>

</body>


</html>
'

?>