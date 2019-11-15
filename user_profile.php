<!DOCTYPE html>

    <html lang='en' xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta charset='utf-8' />
        <title>Election Essentials</title>
        <link href='user_profile_style.css' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
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
                    <?php include 'login.php'; ?>
                </ul>
            </div>

        <div id="foreground" class="w3-container w3-center w3-border w3-white w3-margin-top">
        <h2 id="title" class="w3-center">What is essential to you?</h2>

        <div class="w3-content w3-left-align" style="width:70%;">

            <div class="w3-container w3-half">
                <input id = "jobs" class="w3-check" type="checkbox" <?php if($jobs){echo "checked";}?>>
                <label>Jobs/Wages</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "environment"  class="w3-check" type="checkbox" <?php if($environment){echo "checked";}?>>
                <label>Environment</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "cjs" class="w3-check" type="checkbox" <?php if($cjs){echo "checked";}?>>
                <label>Criminal Justice System</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "immigration" class="w3-check" type="checkbox" <?php if($immigration){echo "checked";}?>>
                <label>Immigration</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "healthcare" class="w3-check" type="checkbox" <?php if($healthcare){echo "checked";}?>>
                <label>Healthcare</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "education" class="w3-check" type="checkbox" <?php if($education){echo "checked";}?>>
                <label>Education</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "taxes" class="w3-check" type="checkbox" <?php if($taxes){echo "checked";}?>>
                <label>Taxes</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "lgbtq" class="w3-check" type="checkbox" <?php if($lgbtq){echo "checked";}?>>
                <label>LGBTQ+</label>
            </div>

            <div class="w3-container w3-half">
                <input id = "reproductive_issues" class="w3-check" type="checkbox" <?php if($reproductive_issues){echo "checked";}?>>
                <label>Reproductive Issues</label>
            </div>

            <div class="w3-container w3-half">
                <input id="gun_violence" class="w3-check" type="checkbox" <?php if($gun_violence){echo "checked";}?>>
                <label>Gun Violence</label>
            </div>
        </div>

        <div class = "w3-container">
            <button id="submit" class="w3-button w3-light-gray w3-round w3-border w3-margin-top w3-margin-bottom">SUBMIT</button>
        </div>
    </div>

        <div class="w3-container w3-center w3-border w3-white w3-margin-top w3-padding">
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
            <div style='display:block' class='w3-container w3-left-align w3-margin'>
                <a class='w3-button w3-center w3-padding' style='width:75%;grid-row-start:".($i+2).";grid-column-start:1;' href='expanded_article_1.php?title=".$escTitle."'>".$bookmarks[$i]['Article']."</a>
                <button onclick='removeBookmark(\"".$escTitle."\")' class='w3-button w3-right-align w3-margin-left w3-gray'>Remove</button>
            </div>
        ";
    }
?>

        </header>
    </body>
    </html>