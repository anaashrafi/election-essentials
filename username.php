<?php
    session_start();
?>


<?php
    if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
        $_SESSION['user'] = $_POST['use'];

        if($_SESSION['user'] != 'Anon1' && $_SESSION['user'] != ''){

            $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
            $user = 'duttaadri2014@gmail.com';
            $db = new PDO($dsn, $user);
            $statement = $db->prepare("use Election_Essentials;");
            $statement->execute();
            $check = "Select * from Us_Pr Where Username = '".$_SESSION['user']."';";
            $statement = $db->prepare($check);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $count = $statement->rowCount();

            if($_SESSION['Jobs_Wages'] == "true"){
                $jobs = 1;
            }else{
                $jobs = 0;
            }
            if($_SESSION['Taxes'] == "true"){
                $taxes = 1;
            }else{
                $taxes = 0;
            }
            if($_SESSION['Criminal_Justice_System'] == "true"){
                $cjs = 1;
            }else{
                $cjs = 0;
            }
            if($_SESSION['Healthcare'] == "true"){
                $healthcare = 1;
            }else {
                $healthcare = 0;
            }
            if($_SESSION['Reproductive_Issues'] == "true"){
                $reproductive_issues = 1;
            }else{
                $reproductive_issues = 0;
            }
            if($_SESSION['Environment'] == "true"){
                $environment = 1;
            }else{
                $environment = 0;
            }
            if($_SESSION['Immigration'] == "true"){
                $immigration = 1;
            }else{
                $immigration = 0;
            }
            if($_SESSION['Education'] == "true"){
                $education = 1;
            }else{
                $education = 0;
            }
            if($_SESSION['LGBTQ'] == "true"){
                $lgbtq = 1;
            }else{
                $lgbtq = 0;
            }
            if($_SESSION['Gun_Violence'] == "true"){
                $gun_violence = 1;
            }else{
                $gun_violence = 0;
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