<?php
require 'connect.php';
// require 'box.php';

$sql4 = "SELECT tb_stop.id_stop, tb_stop.id_jalur, tb_stop.stop, tb_stop.latitude, tb_stop.longitude, tb_jalur.jalur
FROM tb_stop
LEFT JOIN tb_jalur ON tb_stop.id_jalur=tb_jalur.id_jalur";
$stmt4 = $mysqli->prepare($sql4);
$stmt4->execute();
$result4 = $stmt4->get_result();
//$data_array2 = array();
$geojson = array();

while ($data4 = $result4 -> fetch_assoc()) {
    $properties = $data4;
    unset($properties['latitude']);
    unset($properties['longitude']);
    unset($properties['id_jalur']);
    unset($properties['jalur']);
    $feature = array(
        'type' => 'Feature',
        'geometry' => array(
            'type' => 'Point',
            'coordinates' => array(
                $data4['longitude'],
                $data4['latitude']
            )
        ),
        'id' => $data4['id_jalur'],
        'name' => $data4['jalur'],
        'properties' => $properties
    );
    array_push($geojson, $feature);
}

$json = json_encode($geojson, JSON_PRETTY_PRINT);