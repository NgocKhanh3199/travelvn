let mapOptions = {
  center:[9.99404, 105.74857],
  zoom:10
}


let map = new L.map('map' , mapOptions);

let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
map.addLayer(layer);

let marker = new L.Marker([9.99404, 105.74857]);
marker.addTo(map);