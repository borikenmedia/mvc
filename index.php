<?php
session_start();
error_reporting(E_ERROR|E_WARNING|E_PARSE|E_NOTICE);
date_default_timezone_set("America/Puerto_Rico");
header("Content-type: text/html; Charset: UTF-8; Pragma: no-cache;");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

define("PATH", __DIR__);
define("APPATH", PATH."/modules/");
define("URLREQ", "http://".$_SERVER["SERVER_NAME"]."/alias/");
define("TIME", date("D M d, Y h:ia"));
/* Define Constants */

function autoclass($class){
  $path = PATH."/".str_replace("\\", "/", $class).".class.php";
  (file_exists($path))? require_once($path): new \Exception("CORE_OBJECT:: Class ({$class}) is not available", 1);
}

spl_autoload_register("autoclass");
/* Create a routine for the core libraries */

$app = new \libr\routes;

$app->render();

?>
