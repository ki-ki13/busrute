<?php
require 'connect.php';
require 'database.php';
// require 'box.php';
require 'stop.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rute Bus Bantul</title>
    <link rel ="stylesheet" href="assets/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" />
    <link rel="stylesheet" href="assets/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="main">
        <div class="topnav" id="myTopnav">
            <li class="icon" onclick="myFunction()">
                <i class="fa fa-bars"></i>
            </li>
            <div class="header">
                <i class="fas fa-map"></i>
            </div>
            <div class="list-wrapper">
            <?php 
            $num = 1;
            foreach($data_array as $row ){?>
                <div class="list" id="<?= $row['id_jalur']?>" onclick="return showJadwal(<?= $num?>)"><i class="fa fa-bus"></i><li><?= $row['jalur']?></li></div>
                <?php
                $num ++; 
            }?>
            </div>
        </div>
        <div class="head" id="head"><h2>Rute Bus Bantul</h2></div>
        <div class="flextambahan"></div>
        <div class="map" id="map">
        
            <div id="mapid"></div>
            <div class="arah-jadwal">
                <!-- <div class="arah">
                    <div class="card">
                        <div class="card-body">
                            <div class="stop-title"><h3>Pemberhentian</h3></div>
                            <div class="stop-body">
                                <ul>
                                    <li id="changes" class="changes">Pilih Rute</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div> -->
                    <div class="jadwal"><div class="card">
                        <div class="card-body">
                        <div class="jadwal-title"><h3>Rute Bus</h3></div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Terminal</th>
                                <th scope="col">Lama Perjalanan (menit)</th>
                                <th scope="col">Jadwal 1</th>
                                <th scope="col">Jadwal 2</th>
                                <th scope="col">Jadwal 3</th>
                                </tr>
                            </thead>
                            <tbody id = "schedChanges">
                                <tr>
                                <td >Pilih</th>
                                <td>Rute</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>  </div>
            </div>
            
        </div>
        
    
</div>

<div class="footer" id="footer"><span>&copy Rute Bus Bantul 2021</span></div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"></script>
<script src="assets/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
<script src="assets/leaflet.ajax.js"></script>
<script src="assets/script.js"></script>
<script src="assets/geojson.js"></script>

<script>

var layersJalur = [];
var layerskategoritikor = [];

function popUp(f, l) {
		var out = [];
		if (f.properties) {
			out.push("Jalur " + f.properties['JALUR']);
			l.bindPopup(out.join("<br />"));
		}
	}
    function popUp1(f, l) {
		var out = [];
		if (f.properties) {
			out.push(f.properties['stop']);
			l.bindPopup(out.join("<br />"));
		}
	}
    // function featureToMarker(feature, latlng) {
	// 	return L.marker(latlng, {
	// 		icon: L.divIcon({
	// 			className: 'marker-' + feature.properties.amenity,
	// 			html: iconByName(feature.properties.amenity),
	// 			iconUrl: '../images/markers/' + feature.properties.amenity + '.png',
	// 			iconSize: [25, 41],
	// 			iconAnchor: [12, 41],
	// 			popupAnchor: [1, -34],
	// 			shadowSize: [41, 41]
	// 		})
	// 	});
	// }



    function iconControl(name) {
		return '<i class="fa fa-bus" style="color:' + name + ';border-radius:50%"></i>';
	}
   
    function iconByImage(image) {
		return '<img src="assets/unggah/marker/' + image + '" style="width:16px">';
	}

    var Icon = new L.icon({
        iconUrl: 'assets/icon/map.png',
        iconSize:     [12, 21], // size of the icon
        iconAnchor:   [8, 21], // point of the icon which will correspond to marker's location
        popupAnchor:  [1, -34] // point from which the popup should open relative to the iconAnchor
    });


//var tikor = <-?= $json?>

    var layerskategoritikor = [];
    <?php 
    foreach($data_array as $map){?>
        var myStyle<?= $map['id_jalur']?> = {
			"color": "<?= $map['warna'] ?>",
			"weight": 5,
			"opacity": 0.65}
      
    <?php
		$arrayjalur[] = '{
			name: "' . $map['jalur'] . '",
            id : "'. $map['id_jalur'] .'",
			icon: iconControl("' . $map['warna'] . '"),
			layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/' . $map['geojson'] . '"],{onEachFeature:popUp,style: myStyle' . $map['id_jalur'] . '}).addTo(mymap)
			}';?>

        var layer = {
			name: "<?= $map['jalur']?>",
			icon: iconByImage("<?=  $map['marker']?>"),
			layer: new L.GeoJSON.AJAX(["<?= 'https://rutebus-bantul13.herokuapp.com/stop.php?f=data&p=' . $map['id_jalur'] .''?>"], {

				pointToLayer: function(feature, latlng) {
					// console.log(feature)
					return L.marker(latlng, {
						icon: new L.icon({
							iconUrl: feature.properties.marker,
							iconSize: [15, 20]
						})
					});
				},
				onEachFeature: function(feature, layer) {
					if (feature.properties && feature.properties.jalur) {
						layer.bindPopup(feature.properties.popUp);
					}
				}
			}).addTo(mymap)
		}
        layerskategoritikor.push(layer);
        <?php } ?>


    var jalur = [<?= implode(',', $arrayjalur); ?>]

    var baseLayers = [{
			name: "Map",
			layer: Layer
		}]

    var overLayers = [{
		group: "Jalur",
		layers: jalur
	},
    {
		group: "Pemberhentian",
		layers: layerskategoritikor
	}];


    var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
		collapsibleGroups: true
	});

	mymap.addControl(panelLayers);

    
    </script>

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
