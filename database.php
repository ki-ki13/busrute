<?php
require 'connect.php';

$sql = "SELECT * FROM tb_jalur";
$stmt = $mysqli->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$data_array = array();
$id_array1 = array();
while ($data = $result -> fetch_assoc()) {
    $data_array[] = $data;
}

