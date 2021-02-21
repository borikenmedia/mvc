<?php
namespace modules\models;
defined("APPATH") or exit("<n style=\"font: normal 1em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

use libr\database as db, libr\norms as controller, modules\interfaces\pagescrud as init;
    
class pages extends controller implements init{

    private $db;
    public $path;
    
    public function __construct(){parent::__construct();}
    
    public function createpage(){
        $this->db = db::instance();
        try{
            $sql = "Inser Into database_table_pages Values(null, :uname, :contact, :pagename, :pagetitle, :pagecontent, :pagekeys, :date, :ssid);";
            $query = $this->db->prepare($sql);
            $values = array(
                "uname"=>$this->shtml($_POST["user"]),
                "contact"=>filter_var($_POST["contact"],FILTER_SANITIZE_EMAIL),
                "pagename"=>$this->shtml($_POST["pagename"]),
                "pagetitle"=>$this->shtml($_POST["pagetitle"]),
                "pagecontent"=>$this->shtml($_POST["pagecontent"]),
                "pagekeys"=>$this->shtml($_POST["pagekeys"]),
                "date"=>TIME,
                "ssid"=>$this->ssid);
            if($query->execute($values) != false){
                return((bool)true);
            }
        }catch(\PDOException $e){
            throw new \Exception("Error: The requested database near_createpage is not available Message->".$e->getMessage(), 1);
        }
    }
    
    public function readpage(){
        $this->db = db::instance();
        try{
            $sql = "Select req_id, req_uname, req_ucontact, :req_pagename, :req_pagetitle, :req_pagecontent, :req_pagekeys, :req_date, :req_ssid From database_table_pages Where req_id=:item;";
            $query = $this->db->prepare($sql);
            $values = array("item"=>(!empty($_GET["post"]) && is_int($_GET["post"]))? $this->shtml($_GET["post"]): 1);
            if($query->execute($values) != false){
                $fetch = $query->fetch(\PDO::FETCH_ASSOC);
                return((array)$fetch);
            }
        }catch(\PDOException $e){
            throw new \Exception("Error: The requested database near_readpage is not available Message->".$e->getMessage(), 1);
        }
    }
    
    public function updatepage($column,$value,$item){
        $this->db = db::instance();
        try{
            $sql = "Update database_table_pages Set {$column}=:value Where req_id=:item;";
            $query = $this->db->prepare($sql);
            $values = array("value"=>$value,"item"=>$item);
            if($query->execute($values) != false){
                return((bool)true);
            }
        }catch(\PDOException $e){
            throw new \Exception("Error: The requested database near__updatepage is not available Message->".$e->getMessage(), 1);
        }
    }
    
    public function droppage($item){
        $this->db = db::instance();
        try{
            $sql = "Drop From database_table_pages Where req_id=:item;";
            $query = $this->db->prepare($sql);
            if($query->execute(array("item"=>$item)) != false){
                return((bool)true);
            }
        }catch(\PDOException $e){
            throw new \Exception("Error: The requested database near_droppage is not available Message->".$e->getMessage(), 1); 
        }
    }

}

?>
