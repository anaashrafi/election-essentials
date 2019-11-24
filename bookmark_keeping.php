<?php
    session_start();
    
    $title = $_REQUEST['article'];
    $readwrite = $_REQUEST['write'];
    require "connection.php";
    $connect = Connection::getInstance();
    $db = $connect->getDB();

    //echo "Title: " .$title."\n";
    if($readwrite == 1) { //write = 1 is writing to table
        $putBookmark = "insert into Us_Bo_Ma values ('".$_SESSION['user']."', '".addslashes($title)."');";
        //echo $putBookmark;
        $statement = $db->prepare("use Election_Essentials;");
        $statement->execute();
        $statement = $db->prepare($putBookmark);
        $statement->execute();
    } else {    //write = 0 is delete
        $deleteData = "delete from Us_Bo_Ma where Username = '".$_SESSION['user']."' and Article = '".addslashes($title)."';";
        //echo $deleteData;
        $statement = $db->prepare("use Election_Essentials;");
        $statement->execute();
        $statement = $db->prepare($deleteData);
        $statement->execute();
    }
?>