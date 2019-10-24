<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
	<link href="user_profile_style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>

		<div class ="table">
			<ul class ="nav-tabs">
				<li><a href="threads.php"> HOME </a></li> <!-- class="active-tab" means this is the page the user is currently on-->
				<li><a href="candidates.php"> CANDIDATES </a></li>
				<li><a href="voting_info.php"> VOTER INFORMATION </a></li>
				<li class="active-tab"><a href="user_profile.php"> MY PROFILE </a></li>
        <li><a href="login.php"> LOGIN </a></li>
				<li><a href="aboutme.php"> ABOUT </a></li>
			</ul>
		</div>

    <div id="essentialsForeground">
        <h2 class="title"> Your Essentials </h2>
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

		</div>

    <div id="bookmarksForeground">
      <h2 class="title"> Bookmarks </h2>
      <div class="bookmarkWrapper" style="grid-row-start:2;grid-column-start:2;">

              <a class="bookmarkText" href="">Sample Bookmark #1</a>
            </div>
      <div class="bookmarkWrapper" style="grid-row-start:3;grid-column-start:2;">

              <a class="bookmarkText" href="">Sample Bookmark #2</a>
            </div>

      <div class="bookmarkWrapper" style="grid-row-start:4;grid-column-start:2;">

              <a class="bookmarkText" href="">Sample Bookmark #3</a>
            </div>
    </div>

	</header>
</body>
</html>