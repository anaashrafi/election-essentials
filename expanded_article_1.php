<?php
      
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");
      $statement->execute();
      $sqlGet = "Select * from Ar_Ti_To_Ar Where Title = '" . $_REQUEST['title']."';";
      $statement = $db->prepare($sqlGet);
      $statement->execute();
      $data = $statement->fetchAll();









echo '<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
    <link href="expanded_article_style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<header>
    <div class ="table">
			<ul class ="nav-tabs">
				<li class="active-tab"><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
				<li><a href="candidates.php"> CANDIDATES </a></li>
				<li><a href="voting_info.php"> VOTER INFORMATION </a></li>
				<li><a href="user_profile.php"> MY PROFILE </a></li>
				<li><a href="login.php"> LOGIN </a></li>
				<li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>

    <div class="article">
        <br>
        <p>'.$data[0]["Title"].'</p>
        <br>
      <div class="articleBody">
        <p>'.$data[0]["Article"].' </p> 


    </div>
  </div>

	</header>

  <br>

</body>

</html>'

?>