<?php
namespace libr;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

use \libr\database as db;

class norms{

  private $db;
  private $addr;
  private $uri;
  private $http;
  public $state;
  private $date;
  public $session_id;
  
  public function __construct(){
    $this->addr = $_SERVER["REMOTE_ADDR"];
    $this->uri = $_SERVER["REQUEST_URI"];
    $this->http = $_SERVER["HTTP_USER_AGENT"];
    $this->date = TIME;
    $this->session_id = $this->session_id();
  }
  
  public function setLogs():bool{
    $this->db = db::instance();
    try{
      $sql = "Insert Into database_table_logs Values(null, :addr, :uri, :http, :date, :ssid);";
      $qry = $this->db->prepare($sql);
      $items = array(
        "addr"=>$this->addr,
        "uri"=>$this->uri,
        "http"=>$this->http,
        "date"=>$this->date,
        "ssid"=>$this->session_id);
      if($qry->execute($items) != false){
        $fp = @fopen(PATH."/temporal/logs/log.{$this->session_id}.data.txt", "w+");
        fwrite($fp, "Addr:{$this->addr}\nREQUEST:{$this->uri}\nUSER_AGENT:{$this->http}\nDATE:{$this->date}\nSESSION:{$this->session_id}\n");
        fclose($fp);
      }
    }catch(\PDOException $e){
      throw new \Exception("DATABASE_ERROR: The requested database near_setlogs is nopt available MESSAGE->".$e->getMessage(), 1);
    }
    return((bool)true);
  }
  
  public function setCcahe():bool{
    $this->db = db::instance();
    try{
      $sql = "Insert Into database_table_cache Values(null, :addr, :uri, :http, :cast, :date, :ssid);";
      $qry = $this->db->prepare($sql);
      $items = array(
        "addr"=>$this->addr,
        "uri"=>$this->uri,
        "http"=>$this->http,
        "cast"=>serialize($this->state),
        "date"=>$this->date,
        "ssid"=>$this->ssid);
      if($qry->execute($items) != false){
        $fp = @fopen(PATH."/temporal/cache/cache.{$this->session_id}.data.txt", "w+");
        fwrite($fp, "ADDR:{$this->addr}\nREQUEST:{$this->uri}\nUSER_AGENT:{$this->http}\nCHANGE:{$items["cast"]}\nDATE:{$this->date}\nSSID:{$this->ssid}\n");
        fclose($fp);
      }
    }catch(\PDOException $e){
      throw new \Exception("DATABASE_ERROR: The requested database near_setcache is not available MESSAGE->".$e->getMessage(), 1);
    }
    return((bool)true);
  }
  
  public function message(string $data):string{
    $value = "<script type=\"text/javascript\">alert('{$data}';</script>";
    return((string)$value);
  }
  
  public function shtml(string $data):string{
    return((string)htmlentities($data,ENT_QUOTES));
  }
  
  public function session_id():string{
    $alph = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $length = rand(5,11);
    $str = substr(str_shuffle($alph), 0, $length);
    return((string)$str);
  }
  
}

?>
