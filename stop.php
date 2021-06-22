<?php
require 'connect.php';
require 'database.php';


// $sql4 = "SELECT id_jalur FROM tb_stop;";
// $stmt4 = $mysqli->prepare($sql4);
// $stmt4->execute();
// $result4 = $stmt4->get_result();
// $data4 = $result4 -> fetch_assoc();
// $data_array2 = array();
// $geojson = array();

// while($data4 = $result4 -> fetch_assoc()){
//     $data_array2[] = $data4['id_jalur'];

// }

function data($id = ''){
    global $mysqli;
    $data_array2 = array();
    //global $id_array;
    if($id != ''){
        $sql5 = "SELECT tb_stop.id_stop, tb_stop.id_jalur, tb_stop.stop, tb_stop.latitude, tb_stop.longitude, tb_jalur.jalur, tb_jalur.warna, tb_jalur.marker
        FROM tb_stop
        LEFT JOIN tb_jalur ON tb_stop.id_jalur=tb_jalur.id_jalur
        WHERE tb_stop.id_jalur = ?";
        $stmt5 = $mysqli->prepare($sql5);
        $stmt5 -> bind_param('i', $id);
        $stmt5->execute();
        $result5 = $stmt5->get_result();
        while($data5 = $result5 -> fetch_assoc()){
            $data_array2[] = $data5;
        
        }
    }
    
    foreach($data_array2 as $key){
        $data = null;
        $data['type'] = "Feature";
        $data['properties'] = [
                "jalur" => $key['jalur'],
                "stop" => $key['stop'],
                "marker" => ($key['marker'] == '') ? ('assets/icons/marker.png') : ('assets/unggah/marker/' . $key['marker']),
                "popUp" => "Jalur : " . $key['jalur'] . "<br>Pemberhentian : " . $key['stop']
                ];
        $data['geometry'] = [
                "type" => "Point",
                "coordinates" => [$key['longitude'], $key['latitude']]
                ];
        $response[] = $data;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}

if(isset($_GET['f'])){
    if(function_exists($_GET['f'])) {    
        $_GET['f']($_GET['p']);
    }
}


//     while ($data4 = $result4 -> fetch_assoc()) {
//         $properties = $data4;
//         unset($properties['latitude']);
//         unset($properties['longitude']);
//         unset($properties['id_jalur']);
//         unset($properties['jalur']);
//         $feature = array(
//             'type' => 'Feature',
//             'geometry' => array(
//                 'type' => 'Point',
//                 'coordinates' => array(
//                     $data4['longitude'],
//                     $data4['latitude']
//                 )
//             ),
//             'id' => $data4['id_jalur'],
//             'name' => $data4['jalur'],
//             'properties' => $properties
//         );
//         array_push($geojson, $feature);
//     }

// $json = json_encode($geojson, JSON_PRETTY_PRINT)