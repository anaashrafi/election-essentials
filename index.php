  <?php
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $password = 'D6qs1FPzuOdE6JFu';
      $db = new PDO($dsn, $user, $password);
      $statement = "Select article_name FROM books";
      $statement->execute();
      $all = $statement->fetchAll();
      foreach ($all as $data)
      {
	echo $data["article_name"]."<br>";

      }
	
   ?>