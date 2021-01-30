<?php
namespace modules\controllers;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

use \libr\template as tpl, \modules\models\pages as db;

final class pages{

  private $db;
  private $tpl;
  
  public function __construct(){}
  
  public function home(){
    $this->tpl = new tpl;
    $values = array(
    "title" => "Boriken Media Subs",
    "urlreq" => URLREQ,
    "logo" => "<h1>Boriken Media Subs</h1>",
    "sitemap" => "Welcome_TO_THE_HOME_PAGE",
    "sidebar" => "SIDEBAR_MENU",
    "content" => "CONTENT_BODY");
    $render = $this->tpl->parsetpl($values)->output();
    echo($render);
  }
  
  public function about(){}
  
  public function profile(){}
  
  public function contact(){}
  
  public function cpanel(){
    $this->db = new db;
    $this->tpl = new tpl;
    $values = array(
    "title" => "Boriken Media Subs",
    "urlreq" => URLREQ,
    "logo" => "<h1>Boriken Media Subs</h1>",
    "sitemap" => "Welcome &minus;&gt; Cpanel",
    "sidebar" => "Cpanel_Sidebar",
    "content" => "Content &minus;&gt; Forms<br/>".$this->db->getforms("pages"));
    $render = $this->tpl->parsetpl($values)->output();
    $this->db->setLogs();
    $this->db->state = $render;
    $this->db->setCache();
    echo($render);
  }

}

?>
