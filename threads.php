  <?php
    session_start();
     
      include 'login.php';
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';                                            //'.$_SESSION['user'].'";'
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");
      $sqlGet = 'Select * from Us_Pr Where Username ="'.$_SESSION['user'].'";';

      
      $statement->execute();
      $statement = $db->prepare($sqlGet);
      $statement->execute();
      $data = $statement->fetchAll();
    
      $economy= $data[0]['Economy'];
      $military = $data[0]['Military'];
      $cjs = $data[0]['Criminal_Justice_System'];
      $healthcare = $data[0]['Healthcare'];
      $reproductive_issues = $data[0]['Reproductive_Issues'];
      $environment = $data[0]['Environment'];
      $immigration = $data[0]['Immigration'];
      $education = $data[0]['Education'];
      $lgbtq = $data[0]['LGBTQ'];
      $gun_violence = $data[0]['Gun_Violence'];

      $getArticles = "Select * from Es_To_Ar_Ti where Essential = 'Dummy'"; //dummy here to make appending simpler

      if ($economy){
        $getArticles .= ' or Essential = "Economy"';
      }

      if ($military){
        $getArticles .= ' or Essential = "Military"';
      }

      if ($cjs){
        $getArticles .= ' or Essential = "CJS"'; 
      }

      if ($healthcare){
        $getArticles .= ' or Essential = "Healthcare"';
      }

      if ($reproductive_issues){
        $getArticles .= ' or Essential = "Reproductive Issues"';
      }

      if ($environment){
        $getArticles .= ' or Essential = "Environment"';
      }

      if ($immigration){
        $getArticles .= ' or Essential = "Immigration"';
      }

      if ($education){
        $getArticles .= ' or Essential = "Education"';
      }

      if ($lgbtq){
        $getArticles .= ' or Essential = "LGBTQ"';
      }

      if ($gun_violence){
        $getArticles .= ' or Essential = "Gun Violence"';
      }      

      $getArticles .= ";"; //end of appending
   ?>


<!DOCTYPE html
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="threads_style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
    <script>
        function button(name) {
                var url = 'expanded_article_1.php?title='+name;
                $.post(url, {data: name}, function (response) {
                 location.href ='expanded_article_1.php?title='+name;
        });
        }
    </script>


    
</head>



<body>
	<header>

		<div class ="table">
			<ul class ="nav-tabs">
				<li class="active-tab"><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
				<li><a href="candidates.php"> CANDIDATES </a></li>
				<li><a href="voting_info.php"> VOTER INFORMATION </a></li>
				<li><a href="user_profile.php"> MY PROFILE </a></li>
				<li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>

		<div id="articles" class ="samplearticles">
<?php
            $statement = $db->prepare("use Election_Essentials;");
            $statement->execute();
            $statement = $db->prepare($getArticles);
            $statement->execute();
            $articles = $statement->fetchAll(); 
            $rows = $statement->rowCount();
            for($i = 0; $i < $rows; $i++){
                echo "
                    <a onclick='button(this.innerHTML)' class='article article-name'>".$articles[$i]['Title1']."</a>";
            }
?>
		</div>

	</header>

</body>
</html>