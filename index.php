  <?php
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      $statement = "Select article_name FROM books";
      $statement->execute();
      $all = $statement->fetchAll();
      echo "something is something";
      foreach ($all as $data)
      {
	echo $data["article_name"]."<br>";

      }
	
   ?>