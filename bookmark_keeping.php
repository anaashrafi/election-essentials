<?php
    include 'username.php';
    $title = $_REQUEST['article'];
    $readwrite = $_REQUEST['write'];

    $dsn = "mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata";
    $user = "duttaadri2014@gmail.com";
    $db = new PDO($dsn, $user);


/**********************************************
unfinished
*************************************************/
    if(write == "1") { //write = 1 is writing to table
        $result = $db->query("select * from Us_Bo_Ma where Username = '".$username."' and match (Bookmark1, Bookmark2, Bookmark3) against ('null');");
        if($result->num_rows == 0) {
            // row not found, do stuff...
        } else {
            // do other stuff...

        }
    } else {    //write = 0 is delete
        $deleteData = "select * from Us_Bo_Ma where Username = '".$username."' and match (Bookmark1, Bookmark2, Bookmark3) against ('".$title."');";
        
        $statement = $db->prepare("use Election_Essentials;");
        $statement->execute();
        $statement = $db->prepare($deleteData);
        $statement->execute();
        $bookmarks = $statement->fetchAll(); 
    }
?>