<?php 
    session_start();
?>

<!DOCTYPE html>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'> </script> 
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<script type='text/javascript'>

    function getVotingInfo(){
        
        var obj = $.getJSON("voting_info.json",
            function(json) {
                //TODO
                var voting_data = json;
                var output = '<ul id="myUL">';
                $(voting_data).each(function() {
                    output += '<li><a href="#"><b>' + this.State + '</b><br>Primary Election Deadline: '
                    + this.PrimaryElectionDeadline + '<br>General Election Deadline: ' + 
                    this.GeneralElectionDeadline + '</li>';
                    
                }
                );
                output += '</ul>';
                document.getElementById('state-dates').innerHTML=output;        
            });
        }
</script>

<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="voting_info_style.css" rel="stylesheet" type="text/css">
</head>

<body onload='getVotingInfo()'>
	<header>
    <script>
        function noAccess(){
            alert("Must be logged in to access");
        }
    </script>
      <div class ='table'>
  			<ul class ='nav-tabs'>
  				<li><a href='threads.php'> HOME </a></li> <!-- class='active-tab' means this is the page the user is currently on-->
  				<li><a href='candidates.php'> CANDIDATES </a></li>
  				<li class='active-tab'><a href='voting_info.php'> VOTER INFORMATION </a></li>
                <li><a 
                  <?php 
                    if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
                        echo "href='' onclick='noAccess()'> MY PROFILE </a></li>";
                    }else{
                        echo "href='user_profile.php'> MY PROFILE </a></li>";
                    }
                  ?>
                  <li><a href='aboutme.php'> ABOUT </a></li>
                  <?php include 'login.php';?>
  			</ul>
          </div>
</header>


<input type="text" id="myInput" onkeyup="votingFilter()" placeholder="Search for state info...">

<div id = 'state-dates'></div>



</body>


</html>

<script>
function votingFilter() {
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