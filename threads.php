  <?php
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");
      $sqlGet = 'Select * from Us_Pr Where Username = "Anon1";';
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

      $econtitle= 'none';
      $envtitle= 'none';
      $cjstitle= 'none';
      $heatitle= 'none';
      $reptitle= 'none';
      $miltitle= 'none';
      $immtitle= 'none';
      $edutitle= 'none';
      $lgbtitle= 'none';
      $guntitle= 'none';

      if ($economy)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Economy";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $econtitle = $data[0]['Title1']; 
      }

      if ($military)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Military";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $miltitle = $data[0]['Title1']; 
      }

            if ($cjs)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "CJS";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $cjstitle = $data[0]['Title1']; 
      }

            if ($healthcare)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Healthcare";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $heatitle = $data[0]['Title1']; 
      }

            if ($reproductive_issues)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Reproductive Issues";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $reptitle = $data[0]['Title1']; 
      }

            if ($environment)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Environment";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $envtitle = $data[0]['Title1']; 
      }

            if ($immigration)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Immigration";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $immtitle = $data[0]['Title1']; 
      }

            if ($education)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Education";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $edutitle = $data[0]['Title1']; 
      }

            if ($lgbtq)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "LGBTQ";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $lgbtitle = $data[0]['Title1']; 
      }

            if ($gun_violence)
      {
          $sqlGet = 'Select * from Es_To_Ar_Ti Where Essential = "Gun Violence";';
          $statement = $db->prepare($sqlGet);
          $statement->execute();
          $data = $statement->fetchAll();
          $guntitle = $data[0]['Title1']; 
      }      

      


        



      

    //   echo $economy;
    //   echo $environment;
    //   echo $cjs;
    //   echo $healthcare;
    //   echo $reproductive_issues;

      
   ?>


﻿<!DOCTYPE html
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="threads_style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
    <script>
        $(document).ready(function() {
          
          var eco = "<?php echo $econtitle; ?>" ;
          var env = "<?php echo $envtitle; ?>" ;
          var cjs = "<?php echo $cjstitle; ?>" ;
          var hea = "<?php echo $heatitle; ?>" ;
          var rep = "<?php echo $reptitle; ?>" ;
          var mil = "<?php echo $miltitle; ?>" ;
          var imm = "<?php echo $immtitle; ?>" ;
          var edu = "<?php echo $edutitle; ?>" ;
          var lgb = "<?php echo $lgbtitle; ?>" ;
          var gun = "<?php echo $guntitle; ?>" ;
          if (eco != 'none'){
            $('#articles').append('<a class="article"><div onclick="button(this.innerHTML)" class="article-name">'+eco+'</div></a>');  
          }
        

                  if (env != 'none'){
            $('#articles').append('<a class="article"><div onclick="button(this.innerHTML)" class="article-name">'+env+'</div></a>');  
          }
        

                  if (cjs != 'none'){
            $('#articles').append('<a  class="article"><div onclick="button(this.innerHTML)" class="article-name">'+cjs+'</div></a>');  
          }
        

                  if (hea != 'none'){
            $('#articles').append('<a  class="article"><div onclick="button(this.innerHTML)" class="article-name">'+hea+'</div></a>');  
          }
        

                  if (rep != 'none'){
            $('#articles').append('<a  class="article"><div onclick="button(this.innerHTML)" class="article-name">'+rep+'</div></a>');  
          }
        

                  if (mil != 'none'){
            $('#articles').append('<a  class="article"><div onclick="button(this.innerHTML)" class="article-name">'+mil+'</div></a>');  
          }
        

                  if (imm != 'none'){
            $('#articles').append('<a class="article"><div onclick="button(this.innerHTML)" class="article-name">'+imm+'</div></a>');  
          }
        

                  if (edu != 'none'){
            $('#articles').append('<a   class="article"><div onclick="button(this.innerHTML)" class="article-name">'+edu+'</div></a>');  
          }
        

                  if (lgb != 'none'){
            $('#articles').append('<a   class="article"><div onclick="button(this.innerHTML)" class="article-name">'+lgb+'</div></a>');  
          }
        

                  if (gun != 'none'){
            $('#articles').append('<a class="article"><div onclick="button(this.innerHTML)" class="article-name">'+gun+'</div></a>');  
          }
        });

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
				<li><a href="login.php"> LOGIN </a></li>
				<li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>

		<!-- temporary "articles" that will link to expanded articles when clicked -->
		<div id="articles" class ="samplearticles">

		<!--	 <a  href="expanded_article_1.php" class="article">
			 	<div id = "art1" class="article-name">Sample Article 1</div>
			 </a>
			 <a href="expanded_article_2.php" class="article">
			 	<div class="article-name">Sample Article 2</div>
			 </a>
			 <a href="expanded_article_3.php" class="article">
			 	<div class="article-name">Sample Article 3</div>
			 </a> -->
		</div>

	</header>

</body>
</html>