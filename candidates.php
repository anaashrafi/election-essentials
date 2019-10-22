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
			<a href="biden_profile.php" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1175087314458034177/TgjtVgfG_400x400.png" alt="Joe Biden"></img></div>
				<div class="candidate-name">Joe Biden</div>
			</a>

			<a href="sanders_profile.php" class="candidate-card democrat">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/1097820307388334080/9ddg5F6v_400x400.png" alt="Bernie Sanders"></img></div>
				<div class="candidate-name">Bernie Sanders</div>
			</a>

			<a href="trump_profile.php" class="candidate-card republican">
				<div class="candidate-picture"><img src="https://pbs.twimg.com/profile_images/874276197357596672/kUuht00m_400x400.jpg" alt="Donald Trump"></img></div>
				<div class="candidate-name">Donald Trump</div>
			</a>
		</div>
	</header>



</body>
</html>
