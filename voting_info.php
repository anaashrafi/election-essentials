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






?>
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
        <li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>
</header>
          <?php include 'login.php';?>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for state info...">

<ul id="myUL">
  <li><a href="#">Alabama</a></li>
  <li><a href="#">Alaska</a></li>
  <li><a href="#">Arizona</a></li>
  <li><a href="#">Arkansas</a></li>

  <li><a href="#">California</a></li>
  <li><a href="#">Colorado</a></li>
  <li><a href="#">Connecticut</a></li>

  <li><a href="#">Delaware</a></li>
  
</ul>



</body>


</html>
'

<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>