<?php
require 'connect.php';

$sql2 = "SELECT id_jalur, stop, latitude, longitude, marker FROM tb_stop WHERE id_jalur = ?";
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("i", $_GET['q']);
$stmt2->execute();
$stmt2->store_result();
$num_of_rows = $stmt2->num_rows;
$stmt2->bind_result($id, $stop, $latitude, $longitude, $marker);


while($stmt2 -> fetch()){
    echo "<li>". $stop . "</li>";
}


