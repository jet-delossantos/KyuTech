<?php

//Createing a connection to MySQL database

 class Dbh {
     private $host = 'localhost'; //hostname of your local MySQL database
     private $user = 'root';      //username of your MySQL database
     private $pwd = '';           //password of your MySQL database
     private $dbName = 'satdata'; //name of your MySQL database

     protected function connect() {
         set_time_limit(500);
         //Set-up a Data Source Name(DSN)
         $dsn = 'mysql:host='. $this->host .';dbname=' . $this->dbName;
         //Create a PDO connection
         $pdo = new PDO($dsn,$this->user,$this->pwd);
         //Setting the default fetch mode
         $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
         return $pdo;
     }
 }