<?php
    session_start();
    const checked = 1;
    const unchecked = 0;
?>


<?php
    if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
        $_SESSION['user'] = $_POST['use'];

        if($_SESSION['user'] != 'Anon1' && $_SESSION['user'] != ''){

            require "connection.php";
            $connect = Connection::getInstance();
            $db = $connect->getDB();
            $statement = $db->prepare("use Election_Essentials;");
            $statement->execute();
            $check = "Select * from Us_Pr Where Username = '".$_SESSION['user']."';";
            $statement = $db->prepare($check);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();

            if($_SESSION['Jobs_Wages'] == "true"){
                $jobs = checked;
            }else{
                $jobs = unchecked;
            }
            if($_SESSION['Taxes'] == "true"){
                $taxes = checked;
            }else{
                $taxes = unchecked;
            }
            if($_SESSION['Criminal_Justice_System'] == "true"){
                $cjs = checked;
            }else{
                $cjs = unchecked;
            }
            if($_SESSION['Healthcare'] == "true"){
                $healthcare = checked;
            }else {
                $healthcare = unchecked;
            }
            if($_SESSION['Reproductive_Issues'] == "true"){
                $reproductive_issues = checked;
            }else{
                $reproductive_issues = unchecked;
            }
            if($_SESSION['Environment'] == "true"){
                $environment = checked;
            }else{
                $environment = unchecked;
            }
            if($_SESSION['Immigration'] == "true"){
                $immigration = checked;
            }else{
                $immigration = unchecked;
            }
            if($_SESSION['Education'] == "true"){
                $education = checked;
            }else{
                $education = unchecked;
            }
            if($_SESSION['LGBTQ'] == "true"){
                $lgbtq = checked;
            }else{
                $lgbtq = unchecked;
            }
            if($_SESSION['Gun_Violence'] == "true"){
                $gun_violence = checked;
            }else{
                $gun_violence = unchecked;
            }

            if($count == 0){
                        $setData = "insert into Us_Pr Set Username =".$_SESSION['user'].", Jobs_Wages =" . $jobs . "," . "Criminal_Justice_System =" . $cjs . "," . "Healthcare =" . $healthcare. "," . "Taxes =" . $taxes. "," . "Reproductive_Issues =" . $reproductive_issues. "," . "Environment =" . $environment. "," . "Immigration =" . $immigration. "," . "Education =" . $education. "," . "LGBTQ =" . $lgbtq. "," . "Gun_Violence =" . $gun_violence . 
            ";";
            }else {
                        $setData = "update Us_Pr " ."Set Jobs_Wages =" . $jobs . "," . "Criminal_Justice_System =" . $cjs . "," . "Healthcare =" . $healthcare. "," . "Taxes =" . $taxes. "," . "Reproductive_Issues =" . $reproductive_issues. "," . "Environment =" . $environment. "," . "Immigration =" . $immigration. "," . "Education =" . $education. "," . "LGBTQ =" . $lgbtq. "," . "Gun_Violence =" . $gun_violence . 
            " Where Username = '".$_SESSION['user']."';";
            }

            $statement = $db->prepare($setData);
            $statement->execute();
        }
    }else{
        $_SESSION['user'] = $_POST['use'];
    }

?>