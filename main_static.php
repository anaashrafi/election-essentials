<?php
    include 'user_preference_main_factory.php'
?>

<!DOCTYPE html>
   <!-- comment -->
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>Election Essentials</title>
    <link href="body_style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"> </script> 
    

</head>

<body>
    <header>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
            include 'config.php'; //holds api key
            echo '<meta name="google-signin-client_id" content="'.$CLIENT_ID.'">';
        ?>

        <div class ='table'>
                <ul class ='nav-tabs'>
                    <?php include 'login.php'; ?>
                </ul>
            </div>
    </header>

    <div id="foreground" class="w3-container w3-center w3-border w3-white" style="margin-top:100px">
        <h2 id="title" class="w3-center">What is essential to you?</h2>
        
        <?php
            
            $form = new UserPreferenceMainFactory;
            $form->createInputs();
            $form->createSubmit();
        ?>
    </div>
</body>
</html>
