<?php
namespace libr;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

final class template{

  private $tpl;
  private $path;
  
  public function __construct($theme = "theme"){
    $this->path = PATH."/template/{$theme}.tpl.php";
    if(file_exists($this->path)){
      $this->tpl = implode("", file($this->path));
    }else{
      throw new \Exception("TEMPLATE_ERROR: The requested template::{$theme} is not available", 1);
    }
    return($this);
  }
  
  private function buffertpl($data){
    ob_start();
    @include($data);
    $value = ob_get_contents();
    ob_end_clean();
    return($value);
  }
  
  public function parsetpl(array $data):object{
    if(count($data) >= 1){
      foreach($data as $key => $value){
        $handle = (file_exists($value))? $this->buffertpl($value): $value;
        $this->tpl = preg_replace("/{{$key}}/", $handle, $this->tpl);
      }
    }else{
      throw new \Exception("TEMPLATE_ERROR: Theres not matches for replacement", 1);
    }
    return((object)$this);
  }
  
  public function output(){
    return($this->tpl);
  }
  
}

?>
