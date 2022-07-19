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

/////////////////////////////////
//Site markers
/////////////////////////////////

var abydos = L.marker([26.185, 31.918889]).addTo(map);
var achziv = L.marker([33.047778, 35.102222]).addTo(map);
var agiaTriada = L.marker([35.058889, 24.7925]).addTo(map);
var aigina = L.marker([37.73, 23.49]).addTo(map);
var akko = L.marker([32.927778, 35.081667]).addTo(map);
var amathus = L.marker([34.7125, 33.141667]).addTo(map);
var anavyssos = L.marker([37.733333, 23.95]).addTo(map);
var argos = L.marker([37.616667, 22.716667]).addTo(map);
var ashkelon = L.marker([31.666667, 34.566667]).addTo(map);
var asine = L.marker([37.52659, 22.87403]).addTo(map);
var athens = L.marker([37.984167, 23.728056]).addTo(map);
var bademgedigiTepe = L.marker([38.125, 27.3225]).addTo(map);
var balawat = L.marker([36.229444, 43.403333]).addTo(map);
var bethShemesh = L.marker([31.745556, 34.986667]).addTo(map);
var byblos = L.marker([34.123611, 35.651111]).addTo(map);
var caere = L.marker([42, 12.1]).addTo(map);
var carmelRidge = L.marker([32.733333, 35.05]).addTo(map);
var chaeronea = L.marker([38.516667, 22.85]).addTo(map);
var dirmil = L.marker([36.9975, 29.545]).addTo(map);
var dramesi = L.marker([38.386, 23.629]).addTo(map);
var dursarruken = L.marker([36.509444, 43.229444]).addTo(map);
var ekron = L.marker([31.77889, 34.84992]).addTo(map);
var eleanPylos = L.marker([37.85, 21.5667]).addTo(map);
var eleusis = L.marker([38.033333, 23.533333]).addTo(map);
var eleutherae = L.marker([38.179444, 23.375833]).addTo(map);
var enkomi = L.marker([35.158333, 33.891111]).addTo(map);
var epidauros = L.marker([37.597778, 23.074444]).addTo(map);
var eretria = L.marker([38.398056, 23.790556]).addTo(map);
var hama = L.marker([35.133333, 36.75]).addTo(map);
var gazi = L.marker([35.325, 25.066667]).addTo(map);
var gurob = L.marker([29.2, 30.95]).addTo(map);
var halaSultanTekke = L.marker([34.885277, 33.610013]).addTo(map);
var idaeanCave = L.marker([35.20888308739201, 24.8290261]).addTo(map);
var iklaina = L.marker([36.995, 21.723333]).addTo(map);
var ithaca = L.marker([38.366667, 20.716667]).addTo(map);
var kalapodi = L.marker([38.634167, 22.885]).addTo(map);
var kalochorafitis = L.marker([35.1104, 24.8178]).addTo(map);
var karnak = L.marker([25.718611, 32.658611]).addTo(map);
var karpasPeninsula = L.marker([35.527756, 34.277344]).addTo(map);
var kalokhorioKlirou = L.marker([35.010278, 33.164444]).addTo(map);
var karatepe = L.marker([37.295725, 36.253948]).addTo(map);
var kastanas = L.marker([40.818333, 22.658333]).addTo(map);
var kavousi = L.marker([35.272222, 25.748611]).addTo(map);
var kazaphani = L.marker([35.317222, 33.354167]).addTo(map);
var keos = L.marker([37.623056, 24.336667]).addTo(map);
var khalasmenos = L.marker([34.941667, 32.533333]).addTo(map);
var kition = L.marker([34.9233, 33.6305]).addTo(map);
var knossos = L.marker([35.298056, 25.163056]).addTo(map);
var kos = L.marker([36.85, 27.233333]).addTo(map);
var kynos = L.marker([38.7234, 23.0622]).addTo(map);
var lefkandi = L.marker([38.4125, 23.675278]).addTo(map);
var limanTepe = L.marker([38.363333, 26.775833]).addTo(map);
var limassol = L.marker([34.674722, 33.044167]).addTo(map);
var luxor = L.marker([25.683333, 32.65]).addTo(map);
var lysi = L.marker([35.105278, 33.681111]).addTo(map);
var maroni = L.marker([34.757222, 33.355833]).addTo(map);
var medinetHabu = L.marker([25.72, 32.600833]).addTo(map);
var megaraHyblaea = L.marker([37.2039, 15.1819]).addTo(map);
var methana = L.marker([37.566667, 23.383333]).addTo(map);
var moulki = L.marker([37.9916, 22.7252]).addTo(map);
var mycenae = L.marker([37.730278, 22.7575]).addTo(map);
var nimrud = L.marker([36.098056, 43.328889]).addTo(map);
var nineveh = L.marker([36.359444, 43.152778]).addTo(map);
var orchomenos = L.marker([38.483333, 22.983333]).addTo(map);
var ormidhia = L.marker([34.9925, 33.780278]).addTo(map);
var oropos = L.marker([38.3, 23.75]).addTo(map);
var palaepaphos = L.marker([34.6978, 32.592]).addTo(map);
var patriki = L.marker([35.363056, 33.996111]).addTo(map);
var phaistos = L.marker([35.051389, 24.813611]).addTo(map);
var phylakopi = L.marker([36.755, 24.5046]).addTo(map);
var pithekoussai = L.marker([40.731204, 13.895721]).addTo(map);
var platea = L.marker([38.219992, 23.273853]).addTo(map);
var pylos = L.marker([36.916667, 21.7]).addTo(map);
var salamis = L.marker([35.183333, 33.9]).addTo(map);
var santaMariaDeOia = L.marker([42, -8.866667]).addTo(map);
var saqqara = L.marker([29.871111, 31.216389]).addTo(map);
var sidon = L.marker([33.560556, 35.375833]).addTo(map);
var sinda = L.marker([35.158056, 33.698889]).addTo(map);
var skyros = L.marker([38.883333, 24.516667]).addTo(map);
var sounion = L.marker([37.652, 24.026]).addTo(map);
var sparta = L.marker([37.081944, 22.423611]).addTo(map);
var tanagra = L.marker([38.316667, 23.533333]).addTo(map);
var tellAbuHawam = L.marker([32.800833, 35.019167]).addTo(map);
var telDor = L.marker([32.6175, 34.9175]).addTo(map);
var tellElDaba = L.marker([30.783333, 31.833333]).addTo(map);
var tellHalaf = L.marker([36.8266, 40.0396]).addTo(map);
var tellMiqneEkron = L.marker([31.77889, 34.84992]).addTo(map);
var tellTweini = L.marker([35.371667, 35.936389]).addTo(map);
var teneida = L.marker([25.5166646, 29.166666]).addTo(map);
var thebesaegean = L.marker([38.320833, 23.317778]).addTo(map);
var thebesegypt = L.marker([25.720556, 32.610278]).addTo(map);
var thisbe = L.marker([38.259722, 22.96835]).addTo(map);
var tilBarsip = L.marker([36.674, 38.121]).addTo(map);
var tiryns = L.marker([37.599444, 22.8]).addTo(map);
var tragana = L.marker([37.007, 21.668]).addTo(map);
var ugarit = L.marker([35.602, 35.782]).addTo(map);
var vathyrkakas = L.marker([35.350, 33.183]).addTo(map);
var voundeniamygdalia = L.marker([38.253706, 21.7808]).addTo(map);
var yialousa = L.marker([35.535556, 34.189444]).addTo(map);
var zawyetUmmElRakham = L.marker([31.4, 27.025833]).addTo(map);

// popup binders and text

abydos.bindPopup("<p>Abydos</p>");
achziv.bindPopup("<p>Achziv</p>");
agiaTriada.bindPopup("<p>Agia Triada</p>");
aigina.bindPopup("<p>Aigina</p>");
akko.bindPopup("<p>Akko</p>");
amathus.bindPopup("<p>Amathus</p>");
anavyssos.bindPopup("<p>Anavyssos</p>");
argos.bindPopup("<p>Argos</p>");
ashkelon.bindPopup("<p>Ashkelon</p>");
asine.bindPopup("<p>Asine</p>");
athens.bindPopup("<p>Athens</p>");
bademgedigiTepe.bindPopup("<p>Bademgedigi Tepe</p>");
balawat.bindPopup("<p>Balawat</p>");
bethShemesh.bindPopup("<p>Beth Shemesh</p>");
byblos.bindPopup("<p>Byblos</p>");
caere.bindPopup("<p>Caere</p>");
carmelRidge.bindPopup("<p>Carmel Ridge</p>");
chaeronea.bindPopup("<p>Chaeronea</p>");
dirmil.bindPopup("<p>Dirmil</p>");
dramesi.bindPopup("<p>Dramesi</p>");
dursarruken.bindPopup("<p>Dur-Sarruken</p>");
ekron.bindPopup("<p>Ekron</p>");
eleanPylos.bindPopup("<p>Elean Pylos</p>");
eleusis.bindPopup("<p>Eleusis</p>");
eleutherae.bindPopup("<p>Eleutherae</p>");
enkomi.bindPopup("<p>Enkomi</p>");
epidauros.bindPopup("<p>Epidauros</p>");
eretria.bindPopup("<p>Eretria</p>");
hama.bindPopup("<p>Hama</p>");
gazi.bindPopup("<p>Gazi</p>");
gurob.bindPopup("<p>Gurob</p>");
halaSultanTekke.bindPopup("<p>Hala Sultan Tekke</p>");
idaeanCave.bindPopup("<p>Idaean Cave</p>");
iklaina.bindPopup("<p>Iklaina</p>");
ithaca.bindPopup("<p>Ithaca</p>");
kalapodi.bindPopup("<p>Kalapodi</p>");
kalochorafitis.bindPopup("<p>Kalochorafitis</p>");
karnak.bindPopup("<p>Karnak</p>");
karpasPeninsula.bindPopup("<p>Karpas Peninsula</p>");
kalokhorioKlirou.bindPopup("<p>kalokhorio klirou</p>");
karatepe.bindPopup("<p>Karatepe</p>");
kastanas.bindPopup("<p>Kastanas</p>");
kavousi.bindPopup("<p>Kavousi</p>");
kazaphani.bindPopup("<p>Kazaphani</p>");
keos.bindPopup("<p>Keos</p>");
khalasmenos.bindPopup("<p>Khalasmenos</p>");
kition.bindPopup("<p>Kition</p>");
knossos.bindPopup("<p>Knossos</p>");
kos.bindPopup("<p>Kos</p>");
kynos.bindPopup("<p>Kynos</p>");
lefkandi.bindPopup("<p>Lefkandi</p>");
limanTepe.bindPopup("<p>Liman Tepe</p>");
limassol.bindPopup("<p>Limassol</p>");
luxor.bindPopup("<p>Luxor</p>");
lysi.bindPopup("<p>Lysi</p>");
maroni.bindPopup("<p>Maroni</p>");
medinetHabu.bindPopup("<p>Medinet Habu</p>");
megaraHyblaea.bindPopup("<p>Megara Hyblaea</p>");
methana.bindPopup("<p>Methana</p>");
moulki.bindPopup("<p>Moulki</p>");
mycenae.bindPopup("<p>Mycenae</p>");
nimrud.bindPopup("<p>Nimrud</p>");
nineveh.bindPopup("<p>Nineveh</p>");
orchomenos.bindPopup("<p>Orchomenos</p>");
ormidhia.bindPopup("<p>Ormidhia</p>");
oropos.bindPopup("<p>Oropos</p>");
palaepaphos.bindPopup("<p>Palaepaphos</p>");
patriki.bindPopup("<p>Patriki</p>");
phaistos.bindPopup("<p>Phaistos</p>");
phylakopi.bindPopup("<p>Phylakopi</p>");
pithekoussai.bindPopup("<p>Pithekoussai</p>");
platea.bindPopup("<p>Platea</p>");
pylos.bindPopup("<p>Pylos</p>");
salamis.bindPopup("<p>Salamis</p>");
santaMariaDeOia.bindPopup("<p>Santa Maria de Oia</p>");
saqqara.bindPopup("<p>Saqqara</p>");
sidon.bindPopup("<p>Sidon</p>");
sinda.bindPopup("<p>Sinda</p>");
skyros.bindPopup("<p>Skyros</p>");
sounion.bindPopup("<p>Sounion</p>");
sparta.bindPopup("<p>Sparta</p>");
tanagra.bindPopup("<p>Tanagra</p>");
tellAbuHawam.bindPopup("<p>Tell Abu Hawam</p>");
telDor.bindPopup("<p>Tel Dor</p>");
tellElDaba.bindPopup("<p>Tell el Dab’a</p>");
tellHalaf.bindPopup("<p>Tell Halaf</p>");
tellMiqneEkron.bindPopup("<p>Tell Miqne Ekron</p>");
tellTweini.bindPopup("<p>Tell Tweini</p>");
teneida.bindPopup("<p>Teneida</p>");
thebesaegean.bindPopup("<p>thebesAegean</p>");
thebesegypt.bindPopup("<p>thebesEgypt</p>");
thisbe.bindPopup("<p>Thisbe</p>");
tilBarsip.bindPopup("<p>Til Barsip</p>");
tiryns.bindPopup("<p>Tiryns</p>");
tragana.bindPopup("<p>Tragana</p>");
ugarit.bindPopup("<p>Ugarit</p>");
vathyrkakas.bindPopup("<p>Vathyrkakas</p>");
voundeniamygdalia.bindPopup("<p>voundeniAmygdalia</p>");
yialousa.bindPopup("<p>Yialousa</p>");
zawyetUmmElRakham.bindPopup("<p>Zawyet Umm El Rakham</p>");


