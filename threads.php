  <?php
    session_start();
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';                                            //'.$_SESSION['user'].'";'
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");       
      $statement->execute();

      if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
        $jobs= $_SESSION['Jobs_Wages'];
        $taxes = $_SESSION['Taxes'];
        $cjs = $_SESSION['Criminal_Justice_System'];
        $healthcare = $_SESSION['Healthcare'];
        $reproductive_issues = $_SESSION['Reproductive_Issues'];
        $environment = $_SESSION['Environment'];
        $immigration = $_SESSION['Immigration'];
        $education = $_SESSION['Education'];
        $lgbtq = $_SESSION['LGBTQ'];
        $gun_violence = $_SESSION['Gun_Violence'];
        
      }else{
        $sqlGet = 'Select * from Us_Pr Where Username ="'.$_SESSION['user'].'";';
        $statement = $db->prepare($sqlGet);
        $statement->execute();
        $data = $statement->fetchAll();
        
        $jobs = $data[0]['Jobs_Wages'];
        $taxes = $data[0]['Taxes'];
        $cjs = $data[0]['Criminal_Justice_System'];
        $healthcare = $data[0]['Healthcare'];
        $reproductive_issues = $data[0]['Reproductive_Issues'];
        $environment = $data[0]['Environment'];
        $immigration = $data[0]['Immigration'];
        $education = $data[0]['Education'];
        $lgbtq = $data[0]['LGBTQ'];
        $gun_violence = $data[0]['Gun_Violence'];
      }

      $getArticles = "Select * from Es_To_Ar_Ti where Essential = 'Dummy'"; //dummy here to make appending simpler

      $informEssentials = "Here are articles that talk about";

      if ($jobs == 1 || $jobs == "true"){
        $getArticles .= ' or Essential = "Jobs"';
        $informEssentials .= " Jobs,";
      }

      if ($taxes == 1 || $taxes == "true"){
        $getArticles .= ' or Essential = "Taxes"';
        $informEssentials .= " Taxes,";
      }

      if ($cjs == 1 || $cjs == "true"){
        $getArticles .= ' or Essential = "CJS"'; 
        $informEssentials .= " Criminal Justice System,";
      }

      if ($healthcare == 1 || $healthcare == "true"){
        $getArticles .= ' or Essential = "Healthcare"';
        $informEssentials .= " Healthcare,";
      }

      if ($reproductive_issues == 1 || $reproductive_issues == "true"){
        $getArticles .= ' or Essential = "Reproductive Issues"';
        $informEssentials .= " Reproductive Issues,";
      }

      if ($environment == 1 || $environment == "true"){
        $getArticles .= ' or Essential = "Environment"';
        $informEssentials .= " Enviroment,";
      }

      if ($immigration == 1 || $immigration == "true"){
        $getArticles .= ' or Essential = "Immigration"';
        $informEssentials .= " Immigration,";
      }

      if ($education == 1 || $education == "true"){
        $getArticles .= ' or Essential = "Education"';
        $informEssentials .= " Education,";
      }

      if ($lgbtq == 1 || $lgbtq == "true"){
        $getArticles .= ' or Essential = "LGBTQ"';
        $informEssentials .= " LGBTQ+,";
      }

      if ($gun_violence == 1 || $gun_violence == "true"){
        $getArticles .= ' or Essential = "Gun Violence"';
        $informEssentials .= " Gun Violence,";
      }      

      $getArticles .= ";"; //end of appending

      $informEssentials = substr($informEssentials,0,-1);

   ?>


<!DOCTYPE html
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
    <link href="threads_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
    <script>
        function button(name) {
                var url = 'expanded_article_1.php?title='+name;
                $.post(url, {data: name}, function (response) {
                 location.href ='expanded_article_1.php?title='+name;
        });
        }

        var Page_Number = 1;
        function nextPage(){
            if(document.getElementsByClassName("page-"+(Page_Number+1)).length != 0){
                $('.page-'+Page_Number).css('display','none');

                Page_Number = Page_Number + 1;
                $('.page-'+Page_Number).css('display','block');
            }
        };

        function prevPage(){
            if(Page_Number > 1){
                $('.page-'+Page_Number).css('display','none');

                Page_Number = Page_Number - 1;
                $('.page-'+Page_Number).css('display','block');
            }
        };
    </script>
    
</head>



<body>
	<header>

		<script>
        function noAccess(){
            alert("Must be logged in to access");
        }
    </script>
      <div class ='table'>
  			<ul class ='nav-tabs'>
  				<li class='active-tab'><a href='threads.php'> HOME </a></li> <!-- class='active-tab' means this is the page the user is currently on-->
  				<li><a href='candidates.php'> CANDIDATES </a></li>
  				<li><a href='voting_info.php'> VOTER INFORMATION </a></li>
                <li><a 
                  <?php 
                    if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
                        echo "href='' onclick='noAccess()'> MY PROFILE </a></li>";
                    }else{
                        echo "href='user_profile.php'> MY PROFILE </a></li>";
                    }
                  ?>
                  <li><a href='aboutme.php'> ABOUT </a></li>
                  <?php include 'login.php'; ?>
  			</ul>
          </div>

    </header>

    <div class="w3-container w3-center w3-white w3-padding w3-margin-top">
        <div class="w3-center">
                <h1>News Feed</h1>
            </div>
            <hr>


            <div id="articles" class ="w3-container samplearticles w3-margin-top">
    <?php
                $statement = $db->prepare("use Election_Essentials;");
                $statement->execute();
                $statement = $db->prepare($getArticles);
                $statement->execute();
                $articles = $statement->fetchAll(); 
                $rows = $statement->rowCount();
                $count = 1;
                for($i = 0; $i < $rows; $i++){
                    if($i >= 10 * $count){
                        $count++;
                    }
                    if($count == 1){
                        echo "<div onclick='button(this.innerHTML)' class='w3-button w3-white w3-left-align page-".$count."' style='display:block;'>".$articles[$i]['Title1']."</div>";
                    }else{
                        echo "<div onclick='button(this.innerHTML)' class='w3-button w3-white w3-left-align page-".$count."' style='display:none;'>".$articles[$i]['Title1']."</div>";
                    }
                }
    ?>
            </div>
        <div id="buttons" class="w3-center w3-margin-top">
            <button id="prev-page" class="w3-button w3-light-gray" onclick="prevPage()">&laquo; Previous</button>
            <button id="next-page" class="w3-button w3-light-gray" onclick="nextPage()">Next &raquo;</button>
        </div>
    </div>
</body>
</html>