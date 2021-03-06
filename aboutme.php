<?php
    session_start();
?>
<!DOCTYPE html>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'> </script> 
    <html lang='en' xmlns='http://www.w3.org/1999/xhtml'>
    <script type='text/javascript'>
        function getGitStats(){
            var contributorsMap = new Map();
            // setting the values
            contributorsMap.set('ple', 'Phat Le');
            contributorsMap.set('anaashrafi', 'Ana Ashrafi');
            contributorsMap.set('AustinDuong', 'Austin Duong');
            contributorsMap.set('RoyceHong', 'Royce Hong');
            contributorsMap.set('adridutta', 'Adri Dutta');
            contributorsMap.set('GeorgeZhang98', 'George Zhang');
            $.getJSON('https://api.github.com/repos/anaashrafi/Election-Essentials/contributors',
                function(data, err) {
                    if (err !== 'success') {
                    //   x.innerHTML = 'Err';
                    } else {
                    // x.innerHTML = 'No Err';
                    }
                    //TODO
                    var repos = data;
                    var totalCommits = 0;
                    $(repos).each(function() {
                        if(contributorsMap.has(this.login)){
                            var output = '<ul style="padding-left:30px">';
                            output += '<li>Commits: ' + this.contributions +
                                '<li>Issues: 0' +
                                    '<li>Test Cases 4' +
                            '</li></li></li>';
                            totalCommits += this.contributions;
                            output += '</ul>';
                            document.getElementById(contributorsMap.get(this.login)+'-stats').innerHTML=output;
                        }
                    });
                    document.getElementById('stats').innerHTML='<p> Commits: ' + totalCommits +
                    ' | Issues: 0 | Test Cases: 27';
                });
            }
    </script>

    <head>
        <meta charset='utf-8' />
        <title>Election Essentials</title>
        <link href='aboutme_style.css' rel='stylesheet' type='text/css'>
    </head>

    <body onload='getGitStats()'>
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
  				<li><a href='voting_info.php'> VOTER INFORMATION </a></li>
                <li><a 
                  <?php 
                    if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
                        echo "href='' onclick='noAccess()'> MY PROFILE </a></li>";
                    }else{
                        echo "href='user_profile.php'> MY PROFILE </a></li>";
                    }
                  ?>
                  <li class='active-tab'><a href='aboutme.php'> ABOUT </a></li>
                  <?php include 'login.php';?>
  			</ul>
          </div>

        <div id='aboutInfo'>
            <h1 align='center' style='padding-top: 20px;'> About Us </h1>
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
            HTML: Used for displaying all information on our web pages.<br>
            CSS: Used for styling our web pages.<br>
            JavaScript:  Used to add function to buttons and make the candidates and articles clickable.<br>
            PHP: Used for interacting with and pulling data from the SQL database.<br>
            Draw.io: Used for UML diagrams.<br>
            GitHub: Used for version control.<br>
            Google Cloud Platform: Used for deploying our app and helping us interact with the SQL database.<br>
            Python: Used for scripting the web scraper and putting the JSON files into the database.<br>
            JQuery: Used for JSON communication with the database.<br>
            MySQL: Used to store our databases like the articles, candidate profile information, and bookmarks.<br>

            </p>
            <br>
            <h2>Data</h2>
            <p>
            Stats from GitHub: <a href='https://api.github.com/repos/anaashrafi/Election-Essentials/contributors'>https://api.github.com/repos/anaashrafi/Election-Essentials/contributors</a> scraped using JavaScript and GitHub API.
            </p>
            <br>
            <h2>Link to GitHub Repo</h2>
            <p>
            <a href='https://github.com/anaashrafi/Election-Essentials.git'>https://github.com/anaashrafi/Election-Essentials.git</a>
            </p>
            <br>
            <h2>Group Members</h2>
            <br>
            <div id = 'Ana Ashrafi'>
                <h3>Ana Ashrafi</h3>
                <p>Major: Electrical and Computer Engineering
                <br>Responsibilities: Candidate Profiles, Extended Article Pages, Frontend</p>
                <img src = 'Ana.png'> </img>
                <p>Ana is a third year ECE major at the University of Texas at Austin. In her free time, she serves as the Vice President of the Student Engineering Council and plays soccer with her friends!
                    </p>
                <div id = 'Ana Ashrafi-stats'></div>
                <br>
            </div>
            <div id = 'Adri Dutta'>
                <h3>Adri Dutta</h3>
                <p>Major: Electrical and Computer Engineering
                <br>Responsibilities: Written Report Requirements, UML, Main Page UI, User Profile UI, Frontend</p>
                <img src = 'Adri.jpg'> </img>
                <p>Adri is a senior at the University of Texas at Austin. During his free time he likes to watch competitive League of Legends and basketball.
                    </p>
                <div id = 'Adri Dutta-stats'></div>
                <br>
            </div>
            <div id = 'Austin Duong'>
                <h3>Austin Duong</h3>
                <p>Major: Electrical and Computer Engineering
                <br>Responsibilities: Navigation tabs UI, Threads page articles, Backend</p>
                <img src = 'Austin.jpg'> </img>
                <p>Austin is a third-year ECE major at the University of Texas at Austin. In his spare time, he likes playing video games and browsing memes.
                </p>
                <div id = 'Austin Duong-stats'></div>
                <br>
            </div>
            <div id = 'George Zhang'>
                <h3>George Zhang</h3>
                <p>Major: Electrical and Computer Engineering
                <br>Responsibilities: Voting Info page, Extended Article page, Backend</p>
                <img src = 'George.jpg'> </img>
                <p>
                George is a senior ECE student at the University of Texas at Austin.
                </p>
                <div id = 'George Zhang-stats'></div>
                <br>
            </div>
            <div id = 'Phat Le'>
                <h3>Phat Le</h3>
                <p>Major: Electrical and Computer Engineering
                <br>Responsibilities: Candidates Page, Frontend</p>
                <img src = 'Phat.jpg'> </img>
                <p>
                Phat is a senior ECE student at the University of Texas at Austin.
                </p>
                <div id = 'Phat Le-stats'></div>
                <br>
            </div>
            <div id = 'Royce Hong'>
                <h3>Royce Hong</h3>
                <p>Major: Electrical and Computer Engineering
                <br>Responsibilities: About Me page, Login page, Backend</p>
                <img src = 'Royce.jpg'> </img>
                <p>
                Royce is a junior ECE student at the University of Texas at Austin. He wastes all his time reading manga.
                </p>
                <div id = 'Royce Hong-stats'></div>
                <br>
            </div>
            <h2>Github Repository Statistics</h2>
            <div id = 'stats'></div>
            <br>
            </header>
        </div>
    </body>


    </html>