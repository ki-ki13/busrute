<?php
// require_once ('MysqliDb.php');

$mysqli = new mysqli("localhost", "root", "", "busbantul");
<<<<<<< HEAD
// $mysqli = new mysqli("sql4.freemysqlhosting.net", "sql4426367", "EiFJBUjHEW", "sql4426367");
=======
>>>>>>> 513f3fdf0ae2b2775caecf28d599a6955d1868b3
if($mysqli->connect_error) {
  exit('Could not connect');
}
