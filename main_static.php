<?php
    session_start();
    include_once('login.php');
    if($_SESSION['user'] != "Anon1"){
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      $statement = $db->prepare("use Election_Essentials;");
      $sqlGet = 'Select * from Us_Pr Where Username = "'.$_SESSION['user'].'";';
      $statement->execute();
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
?>

<!DOCTYPE html>
   <!-- comment -->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="main_style.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
    
<script >
      $(document).ready(function(){
        $("#submit").click(function(){
            var jobs = $("#jobs").prop("checked");
            var environment = $("#environment").prop("checked");  
            var cjs = $("#cjs").prop("checked");
            var immigration = $("#immigration").prop("checked");
            var healthcare = $("#healthcare").prop("checked");
            var education = $("#education").prop("checked");
            var taxes = $("#taxes").prop("checked");
            var lgbtq = $("#lgbtq").prop("checked");
            var reproductive_issues = $("#reproductive_issues").prop("checked");
            var gun_violence = $("#gun_violence").prop("checked");

            var preference_send = 'preference_send.php';
            $.post(preference_send, {jobs: jobs, 
            environment: environment,
            cjs: cjs,
            immigration: immigration,
            healthcare: healthcare,
            education: education,
            taxes: taxes,
            lgbtq: lgbtq,
            reproductive_issues: reproductive_issues,
            gun_violence: gun_violence}, function (response) {
                //alert(response);
                location.href = "threads.php";
        });  

        });
});

</script>
</head>

<body>
	<header>

      <div id="foreground">
        <h2 id="title"> What Are Your Essentials? </h2>
            <div class="checkBoxWrapper" style="grid-row-start:2;grid-column-start:2;">
              <input id = "jobs" class="checkBox" type="checkbox" <?php if($jobs){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Jobs/Wages
</p>
            </div>

            <div class="checkBoxWrapper" style="grid-row-start:2;grid-column-start:3;">
              <input id = "environment"  class="checkBox" type="checkbox" <?php if($environment){echo "checked";}?>>
              <p class="checkBoxChoices" style="grid-column-start:2;"> Environment
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:3;grid-column-start:2;">
              <input id = "cjs" class="checkBox" type="checkbox" <?php if($cjs){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Criminal Justice System

</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:3;grid-column-start:3;">
              <input id = "immigration" class="checkBox" type="checkbox" <?php if($immigration){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Immigration
</p>
            </div>

               <div class="checkBoxWrapper" style="grid-row-start:4;grid-column-start:2;">
              <input id = "healthcare" class="checkBox" type="checkbox" <?php if($healthcare){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Healthcare
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:4;grid-column-start:3;">
              <input id = "education" class="checkBox" type="checkbox" <?php if($education){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Education

</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:5;grid-column-start:2;">
              <input id = "taxes" class="checkBox" type="checkbox" <?php if($taxes){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Taxes
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:5;grid-column-start:3;">
              <input id = "lgbtq" class="checkBox" type="checkbox" <?php if($lgbtq){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> LGBTQ+
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:6;grid-column-start:2;">
              <input id = "reproductive_issues" class="checkBox" type="checkbox" <?php if($reproductive_issues){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Reproductive Issues
</p>
            </div>
        <div class="checkBoxWrapper" style="grid-row-start:6;grid-column-start:3;">
              <input id="gun_violence" class="checkBox" type="checkbox" <?php if($gun_violence){echo "checked";}?>>
              <p class="checkBoxChoices"style="grid-column-start:2;"> Gun Violence
</p>
            </div>
            <div style="grid-row-start:7;grid-column-start:2;grid-column-end:4;justify-content:center;padding-left:48%;transform:scale(1.5);">
            <br>
            <button id="submit">SUBMIT</button>
          </div>
		</div>



	</header>
</body>
</html>
