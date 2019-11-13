<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
    <link href="expanded_article_style.css" rel="stylesheet" type="text/css"> 
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
                    if($_SESSION['user'] == 'Anon1'){
                        echo "href='' onclick='noAccess()'> MY PROFILE </a></li>";
                    }else{
                        echo "href='user_profile.php'> MY PROFILE </a></li>";
                    }
                  ?>
  				<li><a href='aboutme.php'> ABOUT </a></li>
                <?php include 'login.php';?>
<?php
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");
      $statement->execute();
      $check = "Select * from Us_Bo_Ma Where Username = '".$_SESSION['user']."' and Article = '".$_REQUEST['title']."';";
      $statement = $db->prepare($check);
      $statement->execute();
      $row = $statement->fetch(PDO::FETCH_ASSOC);
      $count = $statement->rowCount();

      if($_SESSION['user'] != 'Anon1'){
        if($count == 0){
                    echo '<li><a href="" onclick="saveBookmark()">ADD BOOKMARK</a></li>';
        }else {
                    echo '<li><a href="" onclick="removeBookmark()">REMOVE BOOKMARK</a></li>';
        }
      }

?>
			</ul>
		</div>
<?php

      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");
      $statement->execute();

      $title = $_REQUEST['title'];

      $sqlGet = "Select * from Ar_Ti_To_Ar Where Title = '" .addslashes($title)."';";
      $statement = $db->prepare($sqlGet);
      $statement->execute();
      $data = $statement->fetchAll();

      echo '<div class="article">
        <br>
        <p id="article_title">'.$data[0]["Title"].'</p>
        <br>
        <div class="articleBody">
            <p>'.$data[0]["Article"].' </p> 
        </div>'
?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function saveBookmark() {
            var title = document.getElementById("article_title").innerHTML;
            var bookmark_send = "bookmark_keeping.php?article="+title+"&write=1";
            $.post(bookmark_send, {article: title, write: 1}, function (response) {
                alert("Bookmarked");
                //alert(response);
                location.reload();
            }); 
        }

        function removeBookmark() {
            var title = document.getElementById("article_title").innerHTML;
            var bookmark_send = "bookmark_keeping.php?article="+title+"&write=0";
            $.post(bookmark_send, {article: title, write: 0}, function (response) {
                alert("Bookmark removed");
                location.reload();
            }); 
        }
    </script>
  </div>
</header>

  <br>

</body>

</html>