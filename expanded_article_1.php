<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
    <link href="expanded_article_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
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
                <?php
                    require "connection.php";
                    $connect = Connection::getInstance();
                    $db = $connect->getDB();
                    $statement = $db->prepare("use Election_Essentials;");
                    $statement->execute();
                    $check = "Select * from Us_Bo_Ma Where Username = '".$_SESSION['user']."' and Article = '".$_REQUEST['title']."';";
                    $statement = $db->prepare($check);
                    $statement->execute();
                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                    $count = $statement->rowCount();

                    if($_SESSION['user'] != 'Anon1' && $_SESSION['user'] != ''){
                        if($count == 0){
                                    echo '<li><a id="bookmark" href="#" onclick="bookmark()">ADD BOOKMARK</a></li>';
                        }else {
                                    echo '<li><a id="bookmark" href="#" onclick="bookmark()">REMOVE BOOKMARK</a></li>';
                        }
                    }

                ?>
                <?php include 'login.php';?>
			</ul>
		</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
      function bookmark(){
          var status = document.getElementById("bookmark").innerHTML;
          if(status == "ADD BOOKMARK"){
              saveBookmark();
              document.getElementById("bookmark").innerHTML = "REMOVE BOOKMARK";
          }else{
              removeBookmark();
              document.getElementById("bookmark").innerHTML = "ADD BOOKMARK";
          }
      }

        function saveBookmark() {
            var title = document.getElementById("article_title").innerHTML;
            var bookmark_send = "bookmark_keeping.php?article="+title+"&write=1";
            $.post(bookmark_send, {article: title, write: 1}, function (response) {
            }); 
        }

        function removeBookmark() {
            var title = document.getElementById("article_title").innerHTML;
            var bookmark_send = "bookmark_keeping.php?article="+title+"&write=0";
            $.post(bookmark_send, {article: title, write: 0}, function (response) {
            }); 
        }
    </script>
</header>

<?php

      $connect = Connection::getInstance();
      $db = $connect->getDB();
      $statement = $db->prepare("use Election_Essentials;");
      $statement->execute();

      $title = $_REQUEST['title'];

      $sqlGet = "Select * from Ar_Ti_To_Ar Where Title = '" .addslashes($title)."';";
      $statement = $db->prepare($sqlGet);
      $statement->execute();
      $data = $statement->fetchAll();
?>
    <div class="w3-container w3-white w3-margin-top">
        <h1 id="article_title" class="w3-center"><?php echo $data[0]["Title"]; ?></h1>
        <hr>
        <article class="w3-container w3-left-align w3-margin">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $data[0]["Article"]; ?></article> 
    </div>

</body>

</html>