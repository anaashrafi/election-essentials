<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="threads_style.css" rel="stylesheet" type="text/css">
	<link href="candidates_style.css" rel="stylesheet" type="text/css">

</head>

<body>
	<header>

		<div class ="table">
			<ul class ="nav-tabs">
				<li><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
				<li class="active-tab"><a href="candidates.php"> CANDIDATES </a></li>
				<li><a href="voting_info.php"> VOTER INFORMATION </a></li>
				<li><a href="user_profile.php"> MY PROFILE </a></li>
				<li><a href="login.php"> LOGIN </a></li>
				<li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>

		<div id="cards"> <!---cards are a href to make the whole thing clickable --->
      <a id="Michael Bennet" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/897159863863836676/lopmOrpE_400x400.jpg" alt="Michael Bennet"></img></div>
				<div class="candidate-name">Michael Bennet</div>
			</a>

			<a id="Joe Biden" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1175087314458034177/TgjtVgfG_400x400.png" alt="Joe Biden"></img></div>
				<div class="candidate-name">Joe Biden</div>
			</a>

      <a id="Cory Booker" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1091308075041079297/Yz_PLR20_400x400.jpg" alt="Cory Booker"></img></div>
				<div class="candidate-name">Cory Booker</div>
			</a>

      <a id="Steve Bullock" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1172925435002277888/ycvO0aj4_400x400.jpg" alt="Steve Bullock"></img></div>
				<div class="candidate-name">Steve Bullock</div>
			</a>

      <a id="Pete Buttigieg" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1117312669546164224/k2cPXvek_400x400.png" alt="Pete Buttigieg"></img></div>
				<div class="candidate-name">Pete Buttigieg</div>
			</a>

      <a id="Julian Castro" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1166832028400197632/fCseLHDg_400x400.jpg" alt="Julián Castro"></img></div>
				<div class="candidate-name">Julián Castro</div>
			</a>

      <a id="John Delaney" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1017761512818012161/DXlTw-1E_400x400.jpg" alt="John Delaney"></img></div>
				<div class="candidate-name">John Delaney</div>
			</a>

      <a id="Tulsi Gabbard" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1176853437499215874/ru7zyZe4_400x400.jpg" alt="Tulsi Gabbard"></img></div>
				<div class="candidate-name">Tulsi Gabbard</div>
			</a>

      <a id="Kamala Harris" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1093306247766515712/MBaqSY2M_400x400.jpg" alt="Kamela Harris"></img></div>
				<div class="candidate-name">Kamala Harris</div>
			</a>

      <a id="Amy Klobuchar" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1059812997982511105/lgFAlE5t_400x400.jpg" alt="Amy Klobuchar"></img></div>
				<div class="candidate-name">Amy Klobuchar</div>
			</a>

      <a id="Wayne Messam" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1109619582677983232/CYxbc8ty_400x400.jpg" alt="Wayne Messam"></img></div>
				<div class="candidate-name">Wayne Messam</div>
			</a>

      <a id="Beto O Rourke" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1177725147878477825/Znz9ndSl_400x400.jpg" alt="Beto O’Rourke"></img></div>
				<div class="candidate-name">Beto O’Rourke</div>
			</a>

      <a id="Tim Ryan" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1123997971123712001/dExluxzg_400x400.png" alt="Tim Ryan"></img></div>
				<div class="candidate-name">Tim Ryan</div>
			</a>

			<a id="Bernie Sanders" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1097820307388334080/9ddg5F6v_400x400.png" alt="Bernie Sanders"></img></div>
				<div class="candidate-name">Bernie Sanders</div>
			</a>

      <a id="Tom Steyer" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1180190742519656449/rNDail0A_400x400.jpg" alt="Tom Steyer"></img></div>
				<div class="candidate-name">Tom Steyer</div>
			</a>

      <a id="Elizabeth Warren" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1160721744505769990/tWZQYbBr_400x400.jpg" alt="Elizabeth Warren"></img></div>
				<div class="candidate-name">Elizabeth Warren</div>
			</a>

      <a id="Marianne Williamson" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/859507720814305281/nTvKAGL6_400x400.jpg" alt="Marianne Williamson"></img></div>
				<div class="candidate-name">Marianne Williamson</div>
			</a>

      <a id="Andrew Yang" onclick="grabCandidate(this.id)" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1042886888225267712/1W9BKljE_400x400.jpg" alt="Andrew Yang"></img></div>
				<div class="candidate-name">Andrew Yang</div>
			</a>

      <a id="Mark Sanford" onclick="grabCandidate(this.id)" class="candidate-card republican">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1078744075732426752/nFjsV21f_400x400.jpg" alt="Mark Sanford"></img></div>
				<div class="candidate-name">Mark Sanford</div>
			</a>

			<a id="Donald Trump" onclick="grabCandidate(this.id)" class="candidate-card republican">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/874276197357596672/kUuht00m_400x400.jpg" alt="Donald Trump"></img></div>
				<div class="candidate-name">Donald Trump</div>
			</a>

      <a id="Joe Walsh" onclick="grabCandidate(this.id)" class="candidate-card republican">
				<div class="candidate-picture"><img src="https://ballotpedia.s3.amazonaws.com/images/thumb/0/08/Joe_Walsh_square.jpg/600px-Joe_Walsh_square.jpg" alt="Joe Walsh"></img></div>
				<div class="candidate-name">Joe Walsh</div>
			</a>

      <a id="Bill Weld" onclick="grabCandidate(this.id)" class="candidate-card republican">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1117878796181360642/S7iMiyJg_400x400.png" alt="Bill Weld"></img></div>
				<div class="candidate-name">Bill Weld</div>
			</a>
		</div>
	</header>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
  <script>
    function grabCandidate(name) {
      // name has the candidate they click on
      // need to pull that candidate's data from the database
       //document.write("Hello test");
    //jquery attemp
    //alert(name);
    var candidate_profile_send = 'biden_profile.php?candidate='+name; //'?candidate=name' makes variable definition
    $.post(candidate_profile_send, {candidate: name}, function (response) {
                window.location.href = "biden_profile.php?candidate="+name;
        }); 
    //alert("goodbyeeeeeeeeeeee");
     //xmlhttp test
     /*var xmlhttp;
      if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.open("GET", "biden_profile.php?candidate="+name, true);
        xmlhttp.send();   
        xmlhttp.onreadystatechange = function() {
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
                //window.location.href = "biden_profile.php";
                alert('icecream');
                document.getElementsByClass('candidate-name').innerHTML = xmlhttp.responseText;
                alert('xmlhttp.responseText');
            }else {
                alert('ああああああああああああぁぁぁぁぁぁぁぁ');
            }
        }; */
        //window.location.href = "biden_profile.php"; //changes pages biden's profile is temp for now
    }
  </script>

</body>
</html>
