// var map = L.map('map').setView([51.505, -0.09], 13);

// L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '© OpenStreetMap'
// }).addTo(map);

// L.mapbox.accessToken = 'pk.eyJ1IjoiamFja3NvbnBheW5lOTIiLCJhIjoiY2wxcGh5OXVnMDlvbTNkb2E2Y2lweXRreiJ9.YvoVIUUagcWxK3WZ0XQBBA';
// var map = L.map('map').setView([37.55707727145785, 15.425115117722063], 4);

// // Add tiles from the Mapbox Static Tiles API
// // (https://docs.mapbox.com/api/maps/#static-tiles)
// // Tiles are 512x512 pixels and are offset by 1 zoom level
// L.tileLayer(
//     'https://api.mapbox.com/styles/v1/jacksonpayne92/cl5lnn5y8002915nxji3qpch4/tiles/256/{z}/{x}/{y}@2x?access_token=' + L.mapbox.accessToken, {
//         tileSize: 512,
//         zoomOffset: -1,
//         attribution: '© <a href="https://www.mapbox.com/contribute/">Mapbox</a> © <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
//     }).addTo(map);
//everything above is for loading the map and styling and at the moment shouldn't need changing
//(as far as I know)


/////////////////////////////////
//Site markers
/////////////////////////////////

//var abydos = L.marker([26.185, 31.918889]).addTo(map);
//this declares variable using location name, sets marker on the map to the given coordinates, 
//and makes the icon appear


//abydos.bindPopup("<p>Abydos</p><p>3 results found</p><a href='ancmed.ac.be/search/asdasd'>see results</a>");
//this binds a white box that appears on clicking the marker. if you click on it
//the html in the " " is what will be inside it.

document.getElementById("filterButton").addEventListener("click", filterToggle);


/// On click, give style to filter menu to increase width to display it

function filterToggle() {
    var x = document.getElementById("mapFilters");
    if (x.style.left != "-16%") {
      x.style.left = "-16%";
    } else {
      x.style.left = "0px";
    }
}