<?php
    
    class Connection {
        private static $connection = null;
        private $db;

        private function __construct()
        {
            $dsn = 'mysql:unix_socket=/cloudsql/backend-256601:us-central1:database;dbname=testdata';
            $user = 'duttaadri2014@gmail.com';
            $this->db = new PDO($dsn, $user);

        }

        public function getDB(){
            return $this->db;
        }

        public static function getInstance()
        {
            if (!self::$connection)
            {
                self::$connection = new Connection();
            }
            return self::$connection;
        }
    }
    



















?>