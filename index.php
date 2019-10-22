  <?php
      $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
      $user = 'duttaadri2014@gmail.com';
      $db = new PDO($dsn, $user);
      echo "something is something";
      $statement = $db->prepare("use books;");
      $statement->execute();
      $statement = $db->prepare("select article_name from books;");
      $statement->execute();
      $all = $statement->fetchAll();
      foreach ( $all as $data)
      {
          echo $data['article_name'], '<br>';
      }
   ?>
