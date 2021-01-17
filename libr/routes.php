<?php
namespace libr;
defined("Access denied") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

final class routes{

  private $_method = "pages";
  private $_action = "home";
  private $_param = array();
  public static $path;
  const NAMESPACE_CONTROLLER = "\modules\controllers\\";
  const CONTROLLERS_PATH = APPATH."controllers/";
  
  public function __construct(){
    $url = $this->url;
    $this->_method = routes::CONTROLLERS_PATH.$url[0].".class.php";
    if(file_exists($this->_method)){
      $class = routes::NAMESPACE_CONTROLLER.$url[0];
      unset($url[0]);
    }else{
      $class = routes::NAMESPACE_CONTROLLER."error";
      $action = "notfound";
    }
    $this->_method = new $class;
    if(is_object($this->_method) && method_exists($this->_method, $url[1])){
      $this->_action = $url[1];
      unset($url[1]);
    }
    $this->_param = (is_array($url))? array_values($url): array();
  }
  /* Create a general behave for the search and initialize object::class $properties */
  
  private function geturl():array{
    $this->url = (isset($_GET["app"]))? explode("/",filter_var(rtrim($_GET["app"], "/"), FILTER_SANITIZE_URL)): array("pages", "home");
    return((array)$this->url);
  }
  /* Check and filter the requested url input */
  
  public static function getconfig():array{
    routes::$path = APPATH."configs/mtd.db.ini";
    return((array)(file_exists(routes::$path))? parse_ini_file(routes::$path): array("error", "config"=>"notfound"));
  }
  /* Check and filter the config::database */
  
  public function render(){
    return((array)call_user_func_array(array($this->_method,$this->_action), $this->_param));
  }
  
  public static function getmethod(){}
  public static function getaction(){}
  public static function getparam(){}

}

?>
