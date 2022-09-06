
<?php //fetchrow.php
 require_once 'login.php';
 require_once 'MapMarker.php';
 require_once 'select_list.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error);

 $subSearches = array();
 $subSearchesAssoc = array();

 session_start();

 $Region = get_sql_for_combo("Region", "findspot_region_search", "LIKE");
 if($Region !="")
 {
   array_push($subSearches, $Region);
   array_push($subSearchesAssoc, "AND");
 }

 $Medium = get_sql_for_combo("Medium", "medium_search", "LIKE");
 if($Medium !="")
 {
   array_push($subSearches, $Medium);
   array_push($subSearchesAssoc, "AND");
 }

 $Context = get_sql_for_combo("Context", "context_search", "LIKE");
 if($Context !="")
 {
     array_push($subSearches, $Context);
     array_push($subSearchesAssoc, "AND");
 }

$Figureheads = get_sql_for_combo("Figureheads", "keywords_technical", "LIKE");
if($Figureheads !="")
{
   array_push($subSearches, $Figureheads);
   array_push($subSearchesAssoc, "AND");
}

$ShipType = get_sql_for_combo("ShipType", "keywords_technical", "LIKE");
if($ShipType !="")
{
   array_push($subSearches, $ShipType);
   array_push($subSearchesAssoc, "AND");
}

if(isset($_POST['f1']) && isset($_POST['f2']))
{
	$_SESSION['f1'] = $_POST['f1'];
	$_SESSION['f2'] = $_POST['f2'];


   $t1 = 2000 - ((int)$_POST["f1"])*50;
   $t2 = 2000 - ((int)$_POST["f2"])*50;

   if(!($t1 > 2000 || $t2 > 2000))
   {
      $f1 = $t1;
      $f2 = $t2;
      //echo
      $TimeRange = " (" .  "(date_range_start <= " . $t1  . "  AND date_range_start  >= " . $t2  . ")" . 
                        " OR (date_range_end <= " . $t1  . "  AND date_range_end  >= " . $t2  . "))";
      array_push($subSearches, $TimeRange);
      array_push($subSearchesAssoc, "AND");
   }
}

$SQL = "";
 $i = 0;
if(!empty($subSearches))
{
   $SQL = ' WHERE ';
   foreach($subSearches as $sub)
   {
      $SQL = $SQL . ( $i == 0 ? $sub : ' ' . $subSearchesAssoc[$i - 1] . ' ' . $sub );
      $i++;
   }
}

$q0 = "SET NAMES 'utf8'";
$conn->query($q0);
$q0 = "set CHARSET 'utf8'";
$conn->query($q0);

echo $SQL;

$query = "SELECT findspot_site_search FROM main " . $SQL ;

$result = $conn->query($query);
if (!$result) die($conn->error);
$rows = $result->num_rows;
echo "Number of sites: " . $rows;
$sites = array();
for ($j = 0 ; $j < $rows ; $j++)
 {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_NUM);
	array_push($sites, $row[0]);
 }
$processor = new Processor($sites);
$processor->echoScriptsString();

echo '
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
		<title>AncMed: Homepage</title>

		<!-- external CSS link -->
		
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&family=Source+Sans+Pro:wght@600&family=Spartan:wght@100;400;600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
		integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
		crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
		integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
		crossorigin=""></script>
		<script src="https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.js"></script>
		<link href="https://api.mapbox.com/mapbox.js/v3.3.1/mapbox.css" rel="stylesheet" />
		<link rel="stylesheet" href="css/map.css">
		<link rel="stylesheet" href="css/rSlider.min.css">
		<script src="js/rSlider.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	</head>
	<body>
		<header>
			<a href="index.php">
				<div>
					<a href="index.php">
						<img src="img/logoflatsmallsimple.png" alt="AncMed Logo" class="logo">
						<section class="logoTextContainer">
						   <h1>Ancient Mediterranean</h1>
						   <h1>Digital Project</h1>
						</section>
					 </a>
				</div>
			</a>

			<nav>
				<ul>
					<a href="index.php"><li class="currentPage">Home</li></a>
					<a href="search.php"><li>Search Database</li></a>
					<a href="submit.html"><li>Submit</li></a>
					<a href="sponsors.html"><li>Sponsors</li></a>
					<a href="about.html"><li>About</li></a>
					<a href="donate.html"><li>Donate</li></a>
				</ul>
			</nav>
		</header>

		<section class="mapSection">
			<div id="mapFilters">
				<div class="filtersList">

					<h2>Map Filters</h2>
					<form method="post" action="index.php">

						<section>
							<div class="sliderContainer">
								<input type="text" id="slider" class="slider">
							 </div>
						</section>

						<section>
							<h4 class="collapsible">Region</h4>
							<div class="searchOptionWrapper content">
						   		<div class="spacerLine"></div>
								   '. generate_select_list("Region", $region) . '
						   		<div class="spacerDiv"></div>
							</div>
					 		</section>

						<section>
							<h4 class="collapsible">Medium</h4>
							<div class="searchOptionWrapper content">
							<div class="spacerLine"></div>
									'.generate_select_list("Medium", $medium) .'
							<div class="spacerDiv"></div>
							</div>
						</section>

						<section>
							<h4 class="collapsible">Context</h4>
							<div class="searchOptionWrapper content">
							<div class="spacerLine"></div>
									' . generate_select_list("Context", $context) .' 
							<div class="spacerDiv"></div>
							</div>
						</section>

						<section>
							<h4 class="collapsible">Ship Type</h4>
							<div class="searchOptionWrapper content">
							<div class="spacerLine"></div>
									' . generate_select_list("ShipType", $ship_type) .'
							<div class="spacerDiv"></div>
							</div>
						</section>

						<section>
							<h4 class="collapsible">Figure Head</h4>
							<div class="searchOptionWrapper content">
							<div class="spacerLine"></div>
									' . generate_select_list("Figureheads", $figureheads) .'
							<div class="spacerDiv"></div>
							</div>
						</section>
						<input type="hidden" id="f1" name="f1" value="2000">
						<input type="hidden" id="f2" name="f2" value="500">
						<section>
						<div class="spacerLine"></div>
							<input type="submit">
							<div class="spacerDiv"></div>
						</section>

					</form>
				</div>

				<div class="drawIcon" >
					<img src="img/right-arrow.png" alt="right arrow">
				</div>
			</div>

			<div id="map"></div>
		
		</section>

		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="map1.js"></script>

		<script>
			function SliderChanged(values)
            {
                document.getElementById("f1").value = mySlider.getValueStart().toString();
                document.getElementById("f2").value = mySlider.getValueEnd().toString();
            }
 
 var mySlider = new rSlider({
   target: "#slider",
   values: [2000, 1950, 1900, 1850, 1800, 1750, 1700, 1650, 1600,1550, 1500, 1450, 
   1400, 1350, 1300, 1250, 1200, 1150, 1100, 1050, 1000, 950, 900, 850, 800, 750, 
   700, 650, 600, 550, 500],
   labels: false,
   scale: false,
   step:     1,
   onChange: SliderChanged,
   range: true // range slider
});
var millisecondsToWait = 300;
setTimeout(function() 
{
  mySlider.setValues(" . $f1 . "," . $f2 . ");
}, millisecondsToWait);
		</script>

<script>
	$("option").mousedown(function(e) {
	   e.preventDefault();
	   var originalScrollTop = $(this).parent().scrollTop();
	   console.log(originalScrollTop);
	   $(this).prop("selected", $(this).prop("selected") ? false : true);
	   var self = this;
	   $(this).parent().focus();
	   setTimeout(function() {
		   $(self).parent().scrollTop(originalScrollTop);
	   }, 0);
	   
	   return false;
	});
	</script>
	</body>
</html>
';

function generate_select_list($name, $list_array)
{
	$selectedList= isset($_POST[$name])? (array)$_POST[$name] : [""];

	$out = '<select name="' . $name . '[]"' . ' id="' . $name . '"' . ' multiple style="height:120px"> ';
	foreach ($list_array as $value) 
	{
		$out = $out . '<option value="' . $value . '"' . (in_array($value, $selectedList)? ' selected ' : ' ') . '>' . $value . '</option>';
	}
	$out = $out . '</select>';
	return $out;
}

function get_sql_for_combo($comboName, $columnName, $sqlSeparator = "=")
{
   $i = 0;
   $sql = "";
  if (isset($_POST[$comboName]))
  {
	$_SESSION[$comboName] = $_POST[$comboName];
    $sql = " (";
	foreach(((array)$_POST[$comboName] ) as $r)
	{
	   $r = $sqlSeparator == "LIKE"? '%' . $r . '%' : $r ;
	   $sql = $sql . ($i==0? "(" . $columnName  . " " . $sqlSeparator . ' "' : " OR (" . $columnName . " " . $sqlSeparator . ' "') . $r . '") ';
	   $i ++;
	}
	$sql = $sql . ")"; 
  }
  else
  	unset($_SESSION[$comboName]);
  return $sql;  
}


?>