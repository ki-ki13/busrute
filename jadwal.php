<?php
require 'connect.php';

// $sql3 = "SELECT no, hari, jam FROM tb_jadwal WHERE no = ?";
$sql3 = "SELECT tb_stop.stop, tb_jadwal.durasi, tb_jadwal.jadwal1, tb_jadwal.jadwal2, tb_jadwal.jadwal3, tb_stop.id_jalur 
FROM tb_jadwal 
LEFT JOIN tb_stop ON tb_jadwal.id_stop=tb_stop.id_stop 
LEFT JOIN tb_jalur ON tb_jadwal.id_jalur = tb_jalur.id_jalur
WHERE tb_jadwal.id_jalur = ?";
$stmt3 = $mysqli->prepare($sql3);
$stmt3->bind_param("i", $_GET['q']);
$stmt3->execute();
$stmt3->store_result();
$num_of_rows = $stmt3->num_rows;
$stmt3->bind_result($stop, $durasi, $jadwal1, $jadwal2, $jadwal3, $id_jalur);
// $stmt2->fetch();

while($stmt3 -> fetch()){
    echo "<tr>";
    echo "<td>". $stop . "</td>";
    echo "<td>". $durasi . "</td>";
    echo "<td>". $jadwal1 . "</td>";
    echo "<td>". $jadwal2 . "</td>";
    echo "<td>". $jadwal3 . "</td>";
    echo "</tr>";
}
