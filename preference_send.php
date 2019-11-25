  <?php
    session_start();
        
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

      if($_SESSION['user'] == 'Anon1' || $_SESSION['user'] == ''){
        $_SESSION['Jobs_Wages'] = $_POST['jobs'];
        $_SESSION['Taxes'] = $_POST['taxes'];
        $_SESSION['Criminal_Justice_System'] = $_POST['cjs'];
        $_SESSION['Healthcare'] = $_POST['healthcare'];
        $_SESSION['Reproductive_Issues'] = $_POST['reproductive_issues'];
        $_SESSION['Environment'] = $_POST['environment'];
        $_SESSION['Immigration'] = $_POST['immigration'];
        $_SESSION['Education'] = $_POST['education'];
        $_SESSION['LGBTQ'] = $_POST['lgbtq'];
        $_SESSION['Gun_Violence'] = $_POST['gun_violence'];
      }else{
        if($count == 0){
                $setData = "insert into Us_Pr Set Username =".$_SESSION['user'].", Jobs_Wages =" . $_POST['jobs'] . "," . "Criminal_Justice_System =" . $_POST['cjs'] . "," . "Healthcare =" . $_POST['healthcare']. "," . "Taxes =" . $_POST['taxes']. "," . "Reproductive_Issues =" . $_POST['reproductive_issues']. "," . "Environment =" . $_POST['environment']. "," . "Immigration =" . $_POST['immigration']. "," . "Education =" . $_POST['education']. "," . "LGBTQ =" . $_POST['lgbtq']. "," . "Gun_Violence =" . $_POST['gun_violence'] . 
    ";";
        }else {
                $setData = "update Us_Pr " ."Set Jobs_Wages =" . $_POST['jobs'] . "," . "Criminal_Justice_System =" . $_POST['cjs'] . "," . "Healthcare =" . $_POST['healthcare']. "," . "Taxes =" . $_POST['taxes']. "," . "Reproductive_Issues =" . $_POST['reproductive_issues']. "," . "Environment =" . $_POST['environment']. "," . "Immigration =" . $_POST['immigration']. "," . "Education =" . $_POST['education']. "," . "LGBTQ =" . $_POST['lgbtq']. "," . "Gun_Violence =" . $_POST['gun_violence'] . 
    " Where Username = '".$_SESSION['user']."';";
        }

            $statement = $db->prepare($setData);
            $statement->execute();
    }
	
   ?>