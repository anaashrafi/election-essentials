<?php
    session_start(); //holds Username
    include 'user_preference_factory.php';
?>

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
        <?php
            
            $form = new UserPreferenceProfileFactory;
            $form->createInputs();
            $form->createSubmit();
        ?>
        
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

    
    $connect = Connection::getInstance();
    $db = $connect->getDB();
    
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