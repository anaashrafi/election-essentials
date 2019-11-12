<!DOCTYPE html>

    <html lang='en' xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta charset='utf-8' />
        <title>Election Essentials</title>
        <link href='user_profile_style.css' rel='stylesheet' type='text/css'>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
        <?php 
            include 'login.php';
            
        ?>
        <script>
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
               alert("Essentials Changed");
        });  

        });
});


        function goToArticle(name) {
                var url = 'expanded_article_1.php?title='+name;
                $.post(url, {data: name}, function (response) {
                    location.href ='expanded_article_1.php?title='+name;
                });
        }

        function removeBookmark(name) {
            var bookmark_send = "bookmark_keeping.php?article="+name+"&write=0";
            $.post(bookmark_send, {article: name, write: 0}, function (response) {
                alert("Bookmark removed");
                location.reload();
            }); 
        }
        </script>
    </head>
  <?php
      session_start(); //holds Username

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
?>

    <body>
        <header>

            <div class ='table'>
                <ul class ='nav-tabs'>
                    <li><a href='threads.php'> HOME </a></li> <!-- class='active-tab' means this is the page the user is currently on-->
                    <li><a href='candidates.php'> CANDIDATES </a></li>
                    <li><a href='voting_info.php'> VOTER INFORMATION </a></li>
                    <li class='active-tab'><a href='user_profile.php'> MY PROFILE </a></li>
                    <li><a href='aboutme.php'> ABOUT </a></li>
                </ul>
            </div>

        <div id='essentialsForeground'>
            <h2 class='title'> Your Essentials </h2>
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
            <div style="grid-row-start:7;grid-column-start:2;grid-column-end:3;justify-content:center;padding-left:55%;transform:scale(1.5);">
            <br>
            <button id="submit">SUBMIT</button>
          </div>
            </div>

        <div id='bookmarksForeground'>
        <h2 class='title'> Bookmarks </h2>
<?php
    function escape($value){
        $search = array("'",  '"');
        $replace = array("&#39;", '&quot;');

        return str_replace($search, $replace, $value);
    }

    $getData = "select * from Us_Bo_Ma where Username = '" .$_SESSION['user']. "';";

    $dsn = "mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata";
    $user = "duttaadri2014@gmail.com";
    $db = new PDO($dsn, $user);
    
    $statement = $db->prepare("use Election_Essentials;");
    $statement->execute();
    $statement = $db->prepare($getData);
    $statement->execute();
    $bookmarks = $statement->fetchAll(); 
    $rows = $statement->rowCount();
    for($i = 0; $i < $rows; $i++){
        $escTitle = escape($bookmarks[$i]['Article']);
        echo "
            <div class='bookmarkWrapper' style='grid-row-start:".($i+2).";grid-column-start:1;'>
                <a class='bookmarkText' href='expanded_article_1.php?title=".$escTitle."'>".$bookmarks[$i]['Article']."</a>
                <button onclick='removeBookmark(\"".$escTitle."\")' class='removeButton'>Remove</button>
            </div>
        ";
    }
?>

        </header>
    </body>
    </html>