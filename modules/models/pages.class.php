<?php
namespace modules\models;
defined("APPATH") or exit("<n style=\"font: normal 1em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

use libr\database as db, libr\norms as controller, modules\interfaces\pagescrud as init;
    
class pages extends controller implements init{

    private $db;
    public $path;
    
    public function __construct(){parent::__construct();}
    
    public function createpage(){}
    
    public function readpage(){}
    
    public function updatepage(){}
    
    public function droppage(){}

}

?>
