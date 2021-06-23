<?php
require 'connect.php';

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

while($stmt3 -> fetch()){
    echo "<div class='stop'>";
        echo "<div class='bulet'></div>";
            echo "<div class='text-stop'><span>" . $stop . "</span></div>";
    echo "</div>";
    echo "<div class='line-wrapper'>";
        echo "<div class='line'></div>";
        echo "<div class='jadwal'>";
            echo "<span>Pemberangkatan :</span><br>";
                echo "<span>" . $jadwal1 . "</span>";
                echo "<span>" . $jadwal2 . "</span>";
                echo "<span>" . $jadwal3 . "</span>";
                echo "<p>Lama Perjalanan : " . $durasi . " menit</p>";
        echo "</div>";
    echo "</div>";
   
}
