<?php
  class config 
  {
      private static $pdo = NULL;
  
      public static function getConnexion() 
      {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "gestion_pharmacie";
          if (!isset(self::$pdo)) 
          {
              try
              {
                  self::$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                  self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              }
              catch(Exception $e)
              {
                  die('Connection failed: '.$e->getMessage());
              }
          }
          return self::$pdo;
      }
  }
?>
  