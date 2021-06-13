
var mymap = L.map('mapid').setView([-7.83702297266836, 110.3650265331058], 11);

var Layer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 18,
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1,
		accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
	});
 mymap.addLayer(Layer);
  L.marker([-7.8351312302974385, 110.39227444384483]).addTo(mymap)
      .bindPopup("<b>Terminal Giwangan,</b><br />Giwangan.").openPopup();

var tjalur1 = [[-7.83702297266836, 110.3650265331058],
[-7.86721826106307, 110.34511815556272],
[-7.884836791061993, 110.33066000030477],
[-7.9055705372792096, 110.32056481433368],
[-7.94288792530877, 110.24471715692285],
[-7.98919759623139,110.22050857543945]];

var tjalur2 = [[-7.84259151034209, 110.36275845551795],
[-7.875287293360512, 110.35225297765446],
[-7.9608033198248975, 110.31971536378748],
[-8.022443812766129, 110.32864288417856]];

var tjalur3 = [[-7.866397860845492, 110.4076971650416],
[-7.9207574636933265, 110.38160053088562],
[-7.920207999572687, 110.43589538112376]];

//   var myStyle = {
//     "color": "#002992",
//     "weight": 5,
//     "opacity": 0.65,
// };

// rute = L.geoJSON.ajax("assets/map/map1.geojson", {
//   style: myStyle
// });
var i;
tanda = L.layerGroup();
for(i = 0; i<tjalur1.length; i++){
L.marker(tjalur1[i]).addTo(tanda);
}

// $("#1").click(function(event) {
// event.preventDefault();
// if(mymap.hasLayer(rute)) {
//   $(this).removeClass('selected');
//   mymap.removeLayer(rute);
//   mymap.removeLayer(tanda);
// } else {
//   mymap.addLayer(rute); 
//   mymap.addLayer(tanda);       
//   $(this).addClass('selected');
// }
// });

// rute2 = L.geoJSON.ajax("assets/map/map2.geojson", {
//   style: myStyle
// });
// var i;
// tanda2 = L.layerGroup();
// for(i = 0; i<tjalur2.length; i++){
// L.marker(tjalur2[i]).addTo(tanda2);
// }

// $("#2").click(function(event) {
//   event.preventDefault();
//   if(mymap.hasLayer(rute2)) {
//     $(this).removeClass('selected');
//     mymap.removeLayer(rute2);
//     mymap.removeLayer(tanda2);
//   } else {
//     mymap.addLayer(rute2); 
//     mymap.addLayer(tanda2);       
//     $(this).addClass('selected');
//   }
//   });

//   rute3 = L.geoJSON.ajax("assets/map/map3.geojson", {
//     style: myStyle
//   });
//   var i;
//   tanda3 = L.layerGroup();
//   for(i = 0; i<tjalur3.length; i++){
//   L.marker(tjalur3[i]).addTo(tanda3);
//   }
  
//   $("#3").click(function(event) {
//     event.preventDefault();
//     if(mymap.hasLayer(rute3)) {
//       $(this).removeClass('selected');
//       mymap.removeLayer(rute3);
//       mymap.removeLayer(tanda3);
//     } else {
//       mymap.addLayer(rute3); 
//       mymap.addLayer(tanda3);       
//       $(this).addClass('selected');
//     }
//     });
