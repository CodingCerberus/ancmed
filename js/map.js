// var map = L.map('map').setView([51.505, -0.09], 13);

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '© OpenStreetMap'
// }).addTo(map);

L.mapbox.accessToken = 'pk.eyJ1IjoiamFja3NvbnBheW5lOTIiLCJhIjoiY2wxcGh5OXVnMDlvbTNkb2E2Y2lweXRreiJ9.YvoVIUUagcWxK3WZ0XQBBA';
var map = L.map('map').setView([37.55707727145785, 15.425115117722063], 6);

// Add tiles from the Mapbox Static Tiles API
// (https://docs.mapbox.com/api/maps/#static-tiles)
// Tiles are 512x512 pixels and are offset by 1 zoom level
L.tileLayer(
    'https://api.mapbox.com/styles/v1/jacksonpayne92/cl5lnn5y8002915nxji3qpch4/tiles/256/{z}/{x}/{y}@2x?access_token=' + L.mapbox.accessToken, {
        tileSize: 512,
        zoomOffset: -1,
        attribution: '© <a href="https://www.mapbox.com/contribute/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);