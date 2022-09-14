<?php
require 'connect.php';
require 'database.php';
require 'stop.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🚎 Rute Bus Trans Bantul</title>
    <link rel ="stylesheet" href="assets/astofir.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.3/dist/leaflet.css" />
    <link rel="stylesheet" href="assets/leaflet-panel-layers-master/src/leaflet-panel-layers.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <header class="header">
        <i class="fas fa-map"></i> 
        <h3>Rute Bus Trans Bantul</h3>
    </header>
<main class="main">
    <div class="map1">
        <div id="mapid"></div>
    </div>
    <div class="list1">
        <h3>Rute Bus</h3>
        <div class="toogle">
            <div id = "jalur">
            <?php foreach($data_array as $row) {?>
                <li class="rute" data-id="<?= $row['id_jalur']?>" id="rute<?= $row['id_jalur']?>" onclick="return showJadwal(<?= $row['id_jalur']?>)">
                    <div class ="lili">
                        <i class="fa fa-bus"></i>
                        <span><?= $row['jalur']?><span>
                    </div>
                    <div class="Line"></div>
                </li>
                <div class="muncul" id="muncul<?= $row['id_jalur']?>">
                <!-- <div class="linever">
                    <div class="silang"><i class="fa fa-chevron-left"></i><span>kembali</span></div>
                </div>  -->
                    <div class="stop-wrapper" id="schedChanges<?= $row['id_jalur']?>">
                            
                    </div>
                        <!-- <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">Terminal</th>
                                    <th scope="col">Jadwal 1</th>
                                    <th scope="col">Jadwal 2</th>
                                    <th scope="col">Jadwal 3</th>
                                </tr>
                            </thead>
                            <tbody id="schedChanges">
                            </tbody>
                        </table> -->
                </div>    
            <?php }?>
            </div>
             
        </div>
    </div>
</main>
<footer>
    <span class="footertxt">&copy Rute Bus Trans Bantul 2021</span>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.3.3/dist/leaflet.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
			out.push( f.properties['JALUR']);
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


    function iconControl(name) {
		return '<i class="fa fa-bus" style="color:' + name + ';border-radius:50%"></i>';
	}
    function iconMarker(name) {
		return '<i class="fa fa-map-marker-alt" style="color:' + name + ';border-radius:50%"></i>';
	}
   
    function iconByImage(image) {
		return '<img src="' + image + '"style="width:16px; height = 16px">';
	}

    var Icon = new L.icon({
        iconUrl: 'assets/icon/map.png',
        iconSize:     [12, 21], // size of the icon
        iconAnchor:   [8, 21], // point of the icon which will correspond to marker's location
        popupAnchor:  [1, -34] // point from which the popup should open relative to the iconAnchor
    });


    var layerskategoritikor = [];
    <?php 
    foreach($data_array as $map){?>
        var myStyle<?= $map['id_jalur']?> = {
			"color": "<?= $map['warna'] ?>",
			"weight": 5,
			"opacity": 0.65}
      
    <?php
        // $gone = ["www.dropbox.com","?dl=0"];
        // $replace = ["dl.dropboxusercontent.com",""];
        // $geojson = str_replace($gone,$replace,$map['geojson']);
        $geojson = "http://localhost/busrute/assets/map/{$map['geojson']}";
		$arrayjalur[] = '{
			name: "' . $map['jalur'] . '",
            id : "'. $map['id_jalur'] .'",
			icon: iconControl("' . $map['warna'] . '"),
			layer: new L.GeoJSON.AJAX(["' . $geojson . '"],{onEachFeature:popUp,style: myStyle' . $map['id_jalur'] . '}).addTo(mymap)
			}';?>

        var layer = {
			name: "<?= $map['jalur']?>",
			icon: iconMarker("<?= $map['warna']?>"),
			layer: new L.GeoJSON.AJAX(["<?= 'http://localhost/busrute//stop.php?f=data&p=' . $map['id_jalur'] .''?>"], {

				pointToLayer: function(feature, latlng) {
					return L.marker(latlng, {
						icon: L.divIcon({
							className : 'yoyo',
							html :'<i class="fa fa-map-marker-alt" style="color: '+ feature.properties.warna + '; background-color: none"></i>',
							//iconUrl: iconMarker(feature.properties.warna),
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
		collapsibleGroups: true,
        collapsed :true
	});

	mymap.addControl(panelLayers);

    
    </script>
</body>
</html>