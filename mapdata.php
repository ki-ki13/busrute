<?php
require 'connect.php';
require 'database.php';
require 'stop.php';

function data($jenis = 'jalur', $type = 'point', $id = '')
    {
        header('Content-Type: application/json');
        $response = [];
        if ($jenis == 'jalur') {
            $getjalur = $data_array;
            foreach ($getjalur as $row) {
                $data = null;
                $data['id_jalur'] = $row->id_jalur;
                $data['kd_jalur'] = $row->kd_jalur;
                $data['jalur'] = $row->jalur;
                $data['geojson'] = $row->geojson;
                $data['warna'] = $row->warna;
                $data['marker'] = ($row->marker == '') ? ('assets/icons/marker.png') : ('assets/unggah/marker/' . $row->marker);;
                $response[] = $data;
            }
            echo "var dataJalur=" . json_encode($response, JSON_PRETTY_PRINT);
        }
        if ($jenis == 'kategoritikor') {
            $kategoritikor = $data_array;
            foreach ($kategoritikor as $row) {
                $data = null;
                $data['id_jalur'] = $row->id_jalur;
                $data['jalur'] = $row->jalur;
                $data['marker'] = ($row->marker == '') ? ('assets/icons/marker.png') : ('assets/unggah/marker/' . $row->marker);
                $response[] = $data;
            }
            echo "var datakategoritikor=" . json_encode($response, JSON_PRETTY_PRINT);
        }
         elseif ($jenis == 'tikor') {
            if ($type == 'point') {
                if ($id != '') {
                    $id = $data_array['id_jalur'];
                }
                $getTikor = $data_array2;

                foreach ($getTikor as $row) {
                    $data = null;
                    $data['type'] = "Feature";
                    $data['properties'] = [
                        "jalur" => $row->jalur,
                        "stop" => $row->stop,
                        // "tanggal" => $row->tanggal,
                        "marker" => ($row->marker == '') ? ('assets/icons/marker.png') : ('assets/unggah/marker/' . $row->marker),
                        "popUp" => "Jalur : " . $row->jalur . "<br>Pemberhentian : " . $row->stop
                    ];
                    $data['geometry'] = [
                        "type" => "Point",
                        "coordinates" => [$row->longitude, $row->latitude]
                    ];
                    $response[] = $data;
                }
                echo json_encode($response, JSON_PRETTY_PRINT);
            }
        }
    }