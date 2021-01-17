<?php
namespace modules\interfaces;
defined("APPATH") or exit("<n style=\"font: normal 1.65em Calibri;\">Access denied</n>");

/* Mtd CMS v2 Release Under LGPL3 By dyewilliam */

interface postscrud{
  public function createpost();
  public function readpost();
  public function updatepost();
  public function droppost();
}

?>
