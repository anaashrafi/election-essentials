<?php
    include_once 'index.php'
?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="main_style.css" rel="stylesheet" type="text/css">
  <script>
    function submit() {
      location.href = "threads.html";
    }
</script>

</head>

<body>
	<header>

		<div class ="table">
			<ul class ="nav-tabs">
				<li class="active-tab"><a href="login.html"> LOGIN </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
          </ul>
        </div>

      <div id="foreground">
        <h2 id="title"> What Are Your Essentials? </h2>
            <div class="checkBoxWrapper" style="grid-row-start:2;grid-column-start:2;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Economy
</p>
            </div>

            <div class="checkBoxWrapper" style="grid-row-start:2;grid-column-start:3;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices" style="grid-column-start:2;"> Environment
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:3;grid-column-start:2;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Criminal Justice System

</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:3;grid-column-start:3;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Immigration
</p>
            </div>

               <div class="checkBoxWrapper" style="grid-row-start:4;grid-column-start:2;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Healthcare
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:4;grid-column-start:3;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Education

</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:5;grid-column-start:2;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Military
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:5;grid-column-start:3;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> LGBTQ+
</p>
            </div>

        <div class="checkBoxWrapper" style="grid-row-start:6;grid-column-start:2;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Reproductive Issues
</p>
            </div>
        <div class="checkBoxWrapper" style="grid-row-start:6;grid-column-start:3;">
              <input class="checkBox" type="checkbox">
              <p class="checkBoxChoices"style="grid-column-start:2;"> Gun Violence
</p>
            </div>
            <div style="grid-row-start:7;grid-column-start:2;grid-column-end:4;justify-content:center;padding-left:48%;transform:scale(1.5);">
            <br>
            <button onclick="submit()">SUBMIT</button>
          </div>
		</div>



	</header>
</body>
</html>


