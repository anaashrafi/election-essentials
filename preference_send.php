  <?php
    session_start();
        
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
      if($count == 0){
            $setData = "insert into Us_Pr Set Username =".$_SESSION['user'].", Economy =" . $_POST['economy'] . "," . "Criminal_Justice_System =" . $_POST['cjs'] . "," . "Healthcare =" . $_POST['healthcare']. "," . "Military =" . $_POST['military']. "," . "Reproductive_Issues =" . $_POST['reproductive_issues']. "," . "Environment =" . $_POST['environment']. "," . "Immigration =" . $_POST['immigration']. "," . "Education =" . $_POST['education']. "," . "LGBTQ =" . $_POST['lgbtq']. "," . "Gun_Violence =" . $_POST['gun_violence'] . 
";";
      }else {
            $setData = "update Us_Pr " ."Set Economy =" . $_POST['economy'] . "," . "Criminal_Justice_System =" . $_POST['cjs'] . "," . "Healthcare =" . $_POST['healthcare']. "," . "Military =" . $_POST['military']. "," . "Reproductive_Issues =" . $_POST['reproductive_issues']. "," . "Environment =" . $_POST['environment']. "," . "Immigration =" . $_POST['immigration']. "," . "Education =" . $_POST['education']. "," . "LGBTQ =" . $_POST['lgbtq']. "," . "Gun_Violence =" . $_POST['gun_violence'] . 
" Where Username = '".$_SESSION['user']."';";
      }
      echo($setData);
  //".$_SESSION['user']."'; ";


        $statement = $db->prepare($setData);
        $statement->execute();
     



    //$all = $statement->fetchAll();
    //   echo "something is something";
    //   foreach ($all as $data)
    //   {
	// echo $data["article_name"]."<br>";

    //   }
	
   ?>