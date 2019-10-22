  <?php
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      echo "something is something";
      $statement = $db->prepare("use books;");
      $statement->execute();
      $statement = $db->prepare("select article_name from books;");
      $statement->execute();
      $all = $statement->fetchAll();
      foreach ( $all as $data)
      {
          echo $data['article_name'], '<br>';
      }
   ?>


﻿<!DOCTYPE html
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="threads_style.css" rel="stylesheet" type="text/css">
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

		<!-- temporary "articles" that will link to expanded articles when clicked -->
		<div class ="samplearticles">

			<a href="expanded_article_1.php" class="article">
				<div class="article-name">Sample Article 1</div>
			</a>
			<a href="expanded_article_2.php" class="article">
				<div class="article-name">Sample Article 2</div>
			</a>
			<a href="expanded_article_3.php" class="article">
				<div class="article-name">Sample Article 3</div>
			</a>
		</div>

	</header>

</body>
</html>
