<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript">
    function getGitStats(){
        var myMap = new Map();
        // setting the values
        myMap.set("ple", "Phat Le");
        myMap.set("anaashrafi", "Ana Ashrafi");
        myMap.set("AustinDuong", "Austin Duong");
        myMap.set("RoyceHong", "Royce Hong");
        myMap.set("adridutta", "Adri Dutta");
        myMap.set("GeorgeZhang98", "George Zhang");
        var obj = $.getJSON('https://api.github.com/repos/anaashrafi/Election-Essentials/contributors',
            function(data, err) {
                if (err !== "success") {
                 //   x.innerHTML = "Err";
                 } else {
                  // x.innerHTML = "No Err";
                }
                //TODO
                var repos = data;
                var totalCommits = 0;
                $(repos).each(function() {
                    if(myMap.has(this.login)){
                        var output = "<ul>";
                        output += "<li>Commits: " + this.contributions +
                            "<li>Issues: 0" +
                                "<li>Test Cases 0" +
                        "</li></li></li>";
                        totalCommits += this.contributions;
                        output += "</ul>";
                        document.getElementById(myMap.get(this.login)+"-stats").innerHTML=output;
                    }
                });
                document.getElementById("stats").innerHTML="<p> Commits: " + totalCommits +
                " | Issues: 0 | Test Cases: 0";
            });
        }
</script>

<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="aboutme_style.css" rel="stylesheet" type="text/css">
</head>

<body onload="getGitStats()">
	<header>

	<div class ="table">
		<ul class ="nav-tabs">
			<li><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
			<li><a href="candidates.php"> CANDIDATES </a></li>
			<li><a href="voting_info.php"> VOTER INFORMATION </a></li>
			<li><a href="user_profile.php"> MY PROFILE </a></li>
			<li><a href="login.php"> LOGIN </a></li>
			<li class="active-tab"><a href="aboutme.php"> ABOUT </a></li>
		</ul>
	</div>

	<div id="aboutInfo">
		<h1 align="center" style="margin-top: 30px;"> About Us </h1>
		<br>
		<h2>Team Lion</h2>
		<br>
		<h2>Description, Purpose, Users</h2>
		<p>
		  College students don’t have time to keep up with the 2020 election and all of the news surrounding it. For most, there’s too much going on with classes, extracurriculars, jobs, etc. to be able to do research and learn about each candidate in the race. With our web application, Election Essentials, students would be able to identify the topics that matter most to them, receive information and news articles regarding the various candidates’ views on the specified topics.
		</p>
		<br>
		<h2>Tools Used</h2>
		<p>
		  HTML: Used to generate static pages.<br>
		  CSS: Used to style HTML for the static pages.<br>
		  JavaScript: Used to pull data dynamically from GitHub.<br>
		  Draw.io: Used for UML diagrams.<br>
		  GitHub: Version control. <br>
		  Google Cloud Platform: Used to deploy our app and create our domain.
		</p>
		<br>
		<h2>Data</h2>
		<p>
		  Stats from GitHub: <a href="https://api.github.com/repos/anaashrafi/Election-Essentials/contributors">https://api.github.com/repos/anaashrafi/Election-Essentials/contributors</a> scraped using JavaScript and GitHub API.
		</p>
		<br>
		<h2>Link to GitHub Repo</h2>
		<p>
		  <a href="https://github.com/anaashrafi/Election-Essentials.git">https://github.com/anaashrafi/Election-Essentials.git</a>
		</p>
		<br>
		<h2>Group Members</h2>
		<br>
		<div id = "Ana Ashrafi">
			<h3>Ana Ashrafi</h3>
			<p>Major: Electrical and Computer Engineering
			<br>Responsibilities: Candidate Profiles, Extended Article Pages</p>
			<img src = "Ana.png"> </img>
			<p>Ana is a third year ECE major at the University of Texas at Austin. In her free time, she serves as the Vice President of the Student Engineering Council and plays soccer with her friends!
				   </p>
			<div id = "Ana Ashrafi-stats"></div>
			<br>
		</div>
		<div id = "Adri Dutta">
			<h3>Adri Dutta</h3>
			<p>Major: Electrical and Computer Engineering
			<br>Responsibilities: Written Report Requirements, UML, Main Page UI, User Profile UI</p>
			<img src = "Adri.jpg"> </img>
			<p>Adri is a senior at the University of Texas at Austin. During his free time he likes to watch competitive League of Legends and basketball.
				 </p>
			<div id = "Adri Dutta-stats"></div>
			<br>
		</div>
		<div id = "Austin Duong">
			<h3>Austin Duong</h3>
			<p>Major: Electrical and Computer Engineering
			<br>Responsibilities: Navigation tabs UI, Threads page articles</p>
			<img src = "Austin.jpg"> </img>
			<p>Austin is a third-year ECE major at the University of Texas at Austin. In his spare time, he likes playing video games and browsing memes.
			</p>
			<div id = "Austin Duong-stats"></div>
			<br>
		</div>
		<div id = "George Zhang">
			<h3>George Zhang</h3>
			<p>Major: Electrical and Computer Engineering
			<br>Responsibilities: Voting Info page, Extended Article page</p>
			<img src = "George.jpg"> </img>
			<p>
			  George is a senior ECE student at the University of Texas at Austin.
			</p>
			<div id = "George Zhang-stats"></div>
			<br>
		</div>
		<div id = "Phat Le">
			<h3>Phat Le</h3>
			<p>Major: Electrical and Computer Engineering
			<br>Responsibilities: Candidates Page, Styling</p>
			<img src = "Phat.jpg"> </img>
			<p>
			  Phat is a senior ECE student at the University of Texas at Austin.
			</p>
			<div id = "Phat Le-stats"></div>
			<br>
		</div>
		<div id = "Royce Hong">
			<h3>Royce Hong</h3>
			<p>Major: Electrical and Computer Engineering
			<br>Responsibilities: About Me page, Login page</p>
			<img src = "Royce.jpg"> </img>
			<p>
			  Royce is a junior ECE student at the University of Texas at Austin. He wastes all his time reading manga.
			</p>
			<div id = "Royce Hong-stats"></div>
			<br>
		</div>
		<h2>Github Repository Statistics</h2>
		<div id = "stats"></div>
		<br>
		</header>
	</div>
</body>


</html>