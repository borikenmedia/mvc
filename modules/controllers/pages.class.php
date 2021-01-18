<?php
namespace modules\controllers;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

use \libr\template as tpl;

final class pages{

  private $db;
  private $tpl;
  
  public function __construct(){}
  
  public function home(){
    $this->tpl = new tpl;
    $values = array(
    "title" => "Boriken Media Subs",
    "urlreq" => URLREQ,
    "sitemap" => "Welcome_TO_THE_HOME_PAGE",
    "sidebar" => "SIDEBAR_MENU",
    "content" => "CONTENT_BODY");
    $render = $this->tpl->parsetpl($values)->output();
    echo($render);
  }
  
  public function about(){}
  
  public function profile(){}
  
  public function contact(){}

}

?>
