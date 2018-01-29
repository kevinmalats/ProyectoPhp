<?php
include_once('database.php');

// Define configuration
/*define("DB_HOST", "ec2-23-23-110-26.compute-1.amazonaws.com");
define("DB_USER", "gcsmegnwpekghd");
define("DB_PASS", "5b2b53bc89ee99edb82a8bfd1953b764dd9d870aca60d2918b7876687ff97625");
define("DB_NAME", "d2l7s76r7g7gs6");
*/
define("DB_HOST", "localhost");
define("DB_USER", "postgres");
define("DB_PASS", "1234");
define("DB_NAME", "guarderia");




class Collector extends dataBase
{
  public static $db;
  private $host      = DB_HOST;
  private $username  = DB_USER;
  private $password  = DB_PASS;
  private $dbname    = DB_NAME;
    
  public function __construct()
  {
    self::$db = new dataBase($this->username, $this->password, $this->host, $this->dbname);
  }

}

?>