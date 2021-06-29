<?php
require 'connect.php';
require 'database.php';



function data($id = ''){
    global $mysqli;
    $data_array2 = array();
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
                "marker" => ($key['marker'] == '') ? ('assets/icons/marker.png') : (str_replace("dl=0","raw=1",$map['linkmarker'])),
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


