<?php
require 'connect.php';

$sql3 = "SELECT id, latitude, longitude
FROM map WHERE id = ?";

$stmt3 = $mysqli->prepare($sql3);
$stmt3->bind_param("s", $_GET['q']);
$stmt3->execute();
$stmt3->store_result();
$stmt3->bind_result($id, $latitude, $longitude);


