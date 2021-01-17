<?php
namespace modules\interfaces;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam (nickhere) */

interface pagescrud{
  public function createpage();
  public function readpage();
  public function updatepage();
  public function droppage();
}

?>
