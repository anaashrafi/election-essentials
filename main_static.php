<?php
    include 'username.php';

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
            var economy = $("#economy").prop("checked");
            var environment = $("#environment").prop("checked");  
            var cjs = $("#cjs").prop("checked");
            var immigration = $("#immigration").prop("checked");
            var healthcare = $("#healthcare").prop("checked");
            var education = $("#education").prop("checked");
            var military = $("#military").prop("checked");
            var lgbtq = $("#lgbtq").prop("checked");
            var reproductive_issues = $("#reproductive_issues").prop("checked");
            var gun_violence = $("#gun_violence").prop("checked");

            var preference_send = 'preference_send.php';
            $.post(preference_send, {economy: economy, 
            environment: environment,
            cjs: cjs,
            immigration: immigration,
            healthcare: healthcare,
            education: education,
            military: military,
            lgbtq: lgbtq,
            reproductive_issues: reproductive_issues,
            gun_violence: gun_violence}, function (response) {
               location.href = "threads.php";
        });  

        });
});

</script>
</head>

<body>
	<header>

		<div class ="table">
			<ul class ="nav-tabs">
				<li class="active-tab"><a href="login.php"> LOGIN </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
          </ul>
        </div>

      <div id="foreground">
        <h2 id="title"> What Are Your Essentials? </h2>
            <div class="checkBoxWrapper" style="grid-row-start:2;grid-column-start:2;">
              <input id = "economy" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Economy
</p>
            </div>

            <div class="checkBoxWrapper" style="grid-row-start:2;grid-column-start:3;">
              <input id = "environment"  class="checkBox" type="checkbox">
              <p class="checkBoxChoices" style="grid-column-start:2;"> Environment
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:3;grid-column-start:2;">
              <input id = "cjs" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Criminal Justice System

</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:3;grid-column-start:3;">
              <input id = "immigration" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Immigration
</p>
            </div>

               <div class="checkBoxWrapper" style="grid-row-start:4;grid-column-start:2;">
              <input id = "healthcare" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Healthcare
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:4;grid-column-start:3;">
              <input id = "education" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Education

</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:5;grid-column-start:2;">
              <input id = "military" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Military
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:5;grid-column-start:3;">
              <input id = "lgbtq" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> LGBTQ+
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:6;grid-column-start:2;">
              <input id = "reproductive_issues" class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Reproductive Issues
</p>
            </div>
        <div class="checkBoxWrapper" style="grid-row-start:6;grid-column-start:3;">
              <input id="gun_violence" class="checkBox" type="checkbox">
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
