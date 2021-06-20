
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


