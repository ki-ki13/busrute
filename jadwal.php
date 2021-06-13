<?php
require 'connect.php';

$sql3 = "SELECT no, hari, jam FROM jadwal WHERE no = ?";
$stmt3 = $mysqli->prepare($sql3);
$stmt3->bind_param("i", $_GET['q']);
$stmt3->execute();
$stmt3->store_result();
$num_of_rows = $stmt3->num_rows;
$stmt3->bind_result($id, $hari, $jam);
// $stmt2->fetch();

while($stmt3 -> fetch()){
    echo "<tr>";
    echo "<td>". $hari . "</td>";
    echo "<td>". $jam . "</td>";
    echo "</tr>";
}
