<?php
// $mysqli = new mysqli("localhost", "root", "", "busbantul");
$mysqli = new mysqli("remotemysql.com", "a8XiESBMcr", "pwaiVweVXe", "a8XiESBMcr");
if($mysqli->connect_error) {
  exit('Could not connect');
}