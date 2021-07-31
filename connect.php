<?php
// require_once ('MysqliDb.php');

//$mysqli = new mysqli("localhost", "root", "", "busbantul");
$mysqli = new mysqli("sql305.epizy.com", "epiz_29283373", "0c64kAKLcoZQ", "epiz_29283373_busbantul");
if($mysqli->connect_error) {
  exit('Could not connect');
}
