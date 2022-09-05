<?php
class Marker {
  // Properties
  public $objectName;
  public $X;
  public $Y;
  public $site;  

  // Methods
  function __construct($name, $X, $Y, $site) {
    $this->objectName = $name;
    $this->X = $X;
    $this->Y = $Y;
    $this->site = $site;
  }
}

class Processor {
    // Properties
    public array $markers;
    public array $sites;
    public $file = "markers.csv";  
    public Marker $marker;
  
    // Methods
    function __construct($sites) {
      $this->sites = $sites;
      $this->readMarkers();
    }

    function readMarkers() {
        $this->markers = array();

        $row = 0;
        if (($handle = fopen($this->file, "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                $row++;
                //for ($c=0; $c < $num; $c++) {
                $name = $data[0];
                $X = $data[1];
                $Y = $data[2];
                $site = $data[3];
                $marker = new Marker($name,$X, $Y, $site);
                array_push($this->markers, $marker);
            }
            fclose($handle);
        }
    } 

    function echoScriptsString() {
        $out = "L.mapbox.accessToken = 'pk.eyJ1IjoiamFja3NvbnBheW5lOTIiLCJhIjoiY2wxcGh5OXVnMDlvbTNkb2E2Y2lweXRreiJ9.YvoVIUUagcWxK3WZ0XQBBA';
		var map = L.map('map').setView([37.55707727145785, 15.425115117722063], 6);

		// Add tiles from the Mapbox Static Tiles API
		// (https://docs.mapbox.com/api/maps/#static-tiles)
		// Tiles are 512x512 pixels and are offset by 1 zoom level
		L.tileLayer(
			'https://api.mapbox.com/styles/v1/jacksonpayne92/cl5lnn5y8002915nxji3qpch4/tiles/256/{z}/{x}/{y}@2x?access_token=' + L.mapbox.accessToken, {
				tileSize: 512,
				zoomOffset: -1,
				attribution: '© <a href=\"https://www.mapbox.com/contribute/\">Mapbox</a> © <a href=\"http://www.openstreetmap.org/copyright\">OpenStreetMap</a>'
			}).addTo(map);
		";
        foreach($this->markers as $marker)
        {
            $this->marker = $marker;
            $filteredArray = array_filter(
                $this->sites, 
                function($val){ 
                  return $val === $this->marker->site;
               });
            $count = count($filteredArray);
            if($count > 0) 
            {
                $out = $out . "var " . $marker->objectName . " = L.marker([" . 
                      $marker->X . ", " . $marker->Y . "]).addTo(map);\n";
                $out = $out . $marker->objectName . '.bindPopup("<p>' . $marker->site . '</p><p><a href=\"search.php?site=' . $marker->site . '\">' . $count . ($count==1? ' result' :' results') . ' found</a></p>").openPopup();' . "\n";
            }  
        }
        $myfile = fopen("map1.js", "w");
        fwrite($myfile, $out);
    }

  }




?>