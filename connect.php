<?php
$mysqli = new mysqli("localhost", "root", "", "busbantul");
if($mysqli->connect_error) {
  exit('Could not connect');
}