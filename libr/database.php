<?php
namespace libr;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

use \libr\routes as restful;

class database{
  
  private $_dbhost;
  private $_dbuser;
  private $_dbpass;
  private $_dbname;
  private $_dbconnect;
  public static $_dbinstance;
  
  public function __construct(){
    $config = restful::getconfig();
    try{
      $this->_dbhost = $config["dbhost"];
      $this->_dbuser = $config["dbuser"];
      $this->_dbpass = $config["dbpass"];
      $this->_dbname = $config["dbname"];
      $this->_dbconnect = new \PDO("mysql:host={$this_>_dbhost}; dbname={$this->_dbname};".$this->_dbuser, $this->_dbpass);
      $this->_dbconnect->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      $this->_dbconnect->exec("Set Character Set utf8");
    }catch(\PDOException $e){
      throw new \Exception("DATABASE_ERROR: The requested database near_dbconnect is not available MESSAGE->".$e->getMessage(), 1);
    }
  }
  
  public function prepare(string $sql):bool{
    return($this->_dbconnect->prepare($sql));
  }
  
  public static function instance(){
    if(!atabase::$_dbinstance){
      $class = __CLASS__;
      database::$_dbinstance = new $class;
    }
    return(database::$_dbinstance);
  }
  
  public function __clone(){
    trigger_error("DATABASE_ERROR: The requested method_action::cloning is not available or diabled", E_USER_ERROR);
  }
  
}

?>
