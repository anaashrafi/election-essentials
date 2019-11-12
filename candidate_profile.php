<html>
  <head>
    <title>Election Essentials</title>
    <link href="candidate_profile_style.css" rel="stylesheet" type="text/css">

    <?php
    //jquery/php attempt
    //echo $_REQUEST['candidate'] . "<br>";
    $getData = "select * from Candidate_To_Stance where Candidate_Name = '" . $_REQUEST['candidate']  . "';";
    //$getData = "select * from Candidate_To_Stance where Candidate_Name = 'Tim Ryan';";
    //echo $getData;
    $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
    $user = 'duttaadri2014@gmail.com';
    $db = new PDO($dsn, $user);
    $statement = $db->prepare("use Election_Essentials;");
    $statement->execute();
    $statement = $db->prepare($getData);
    $statement->execute();
    $all = $statement->fetchAll();
    //echo "something is something<p/>";
    //var_dump($all);
/********************************************************************
    $all contains the row, to call individual things do $all[0]['Candidate_Name'], where 0 is the row (should only be 1 row) 
    and 'Candidate_Name is the column header name
*******************************************************/
	//echo $all[0]['Economy']."<br>";
     
 echo " </head>
  <body>
    <header>
      <div class ='table'>
  			<ul class ='nav-tabs'>
  				<li><a href='threads.php'> HOME </a></li> <!-- class='active-tab' means this is the page the user is currently on-->
  				<li class='active-tab'><a href='candidates.php'> CANDIDATES </a></li>
  				<li><a href='voting_info.php'> VOTER INFORMATION </a></li>
  				<li><a href='user_profile.php'> MY PROFILE </a></li>
  				<li><a href='aboutme.php'> ABOUT </a></li>
  			</ul>
          </div>
          ";?>
          <?php include 'login.php';?>
          <?php echo"

      <div id='candidateName'>
        <br>
  			<p>".$all[0]['Candidate_Name']."</p>
        <br>
  		</div>

      <div id='candidatePicture'> <!---cards are a href to make the whole thing clickable --->
      <!---------------------------------------------------------------------------------------
        image needs to be another column 
        ------------------------------------------------------------------------------------>
        <img src=".$all[0]['Profile_Pic']." alt=".$all[0]['Candidate_Name']."></img>
      </div>

      <br>

      <div id='candidateStance'>
        <br>
        <div style='display: inline-block; text-align:left;'>
          <p>
            Jobs/Wages: Leans " .$all[0]['Jobs_Wages']."<br>
            Taxes: Leans " .$all[0]['Taxes']."<br>
            Criminal Justice System: Leans " .$all[0]['Criminal_Justice_System']."<br>
            Healthcare: Leans ".$all[0]['Healthcare']."<br>
            Reproductive Issues: Leans " .$all[0]['Reproductive_Issues']."<br>
            Environment: Leans " .$all[0]['Environment']."<br>
            Immigration: Leans " .$all[0]['Immigration']."<br>
            Education: Leans " .$all[0]['Education']."<br>
            LGBTQ+ Issues: Leans ".$all[0]['LGBTQ']."<br>
            Gun Laws: Leans " .$all[0]['Gun_Violence']."<br>
          </p>
          </div>
        <br>
      </div>

      <div id='learnMore'>
        <br>
        <p>
          Learn more about ".$all[0]['Candidate_Name']."'s campaign 
          <!---------------------------------------------------------------------------------------
        website link needs to be another column 
        ------------------------------------------------------------------------------------>
            <a href= '".$all[0]['Website']."' target='_blank'>here</a>.
        </p>
        <br>
      </div>
    </header>
  </body> 
</html> "

    ?>
