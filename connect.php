<?php
// require_once ('MysqliDb.php');

$mysqli = new mysqli("localhost", "root", "", "busbantul");
// $mysqli = new mysqli("sql4.freemysqlhosting.net", "sql4426367", "EiFJBUjHEW", "sql4426367");
if($mysqli->connect_error) {
  exit('Could not connect');
}