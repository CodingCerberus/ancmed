<?php //fetchrow.php
 require_once 'login.php';
 require_once 'select_list.php';
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error);

 
$subSearches = array();
$subSearchesAssoc = array();

$f1 = 0;
$f2 = 0;

if(isset($_POST['general']) && $_POST["general"] != '')
{
   $gen = $_POST["general"];
 
   //echo
   $GeneralBig = "SELECT disc.id as id from disc JOIN general_desc ON disc.id=general_desc.id JOIN tech_desc ON disc.id = tech_desc.id WHERE " .
     "disc.discussion LIKE '%" . $gen . "%' OR general_desc.general_description LIKE '%" . $gen . "%' OR tech_desc.technical_description LIKE '%" . $gen . "%'";

     $result = $conn->query($GeneralBig);
     if (!$result) die($conn->error);
     
     $rows = $result->num_rows;
     $re = "";
     for ($j = 0 ; $j < $rows ; $j++)
     {
        $result->data_seek($j);
        $row = $result->fetch_array(MYSQLI_ASSOC);
        if($j==0)
           $re = "(main.id IN (" . $row['id'] ;
         else
            $re = $re . ", " . $row['id'] ;
     }
     
     if($re != "")
     {
      // echo $re;
      $re =  $re . "))";
    }

 
   //echo
   $GeneralMain = "(number LIKE '%" . $gen . "%' OR findspot LIKE '%" . $gen . "%' OR medium LIKE '%" . $gen . "%' OR title LIKE '%" . $gen . "%')";

   $GeneralTotal = $re != ""? "(" . $re . " OR " . $GeneralMain . ")" : $GeneralMain ;

   array_push($subSearches, $GeneralTotal);
   array_push($subSearchesAssoc, "AND");
}

if(isset($_POST['f1']) && isset($_POST['f2']))
{
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

$Material = get_sql_for_combo("Material", "material_search", "LIKE");
if($Material !="")
{
   array_push($subSearches, $Material);
   array_push($subSearchesAssoc, "AND");
}

 $Context = get_sql_for_combo("Context", "context_search", "LIKE");
 if($Context !="")
 {
     array_push($subSearches, $Context);
     array_push($subSearchesAssoc, "AND");
 }

 $TechnicalFeatures = get_sql_for_combo("TechnicalFeatures", "keywords_technical", "LIKE");
 if($TechnicalFeatures !="")
 {
     array_push($subSearches, $TechnicalFeatures);
     array_push($subSearchesAssoc, "AND");
 }

$ThematicFeatures = get_sql_for_combo("ThematicFeatures", "keywords_thematic", "LIKE");
if($ThematicFeatures !="")
{
   array_push($subSearches, $ThematicFeatures);
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

$DecorativeFiller = get_sql_for_combo("DecorativeFiller", "keywords_thematic", "LIKE");
if($DecorativeFiller !="")
{
   array_push($subSearches, $DecorativeFiller);
   array_push($subSearchesAssoc, "AND");
}

$Findspot = get_sql_for_combo("findspot", "findspot_site_search", "LIKE");
if($Findspot !="")
{
   array_push($subSearches, $Findspot);
   array_push($subSearchesAssoc, "AND");
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


// mysql_set_charset('utf8', $conn);
 // echo $SQL;

 $query = "SELECT main.id as id, main.title as title, main.number as number, main.medium_search as medium_search, main.findspot_site_search as findspot_site_search,
           main.date_absolute as date_absolute, main.date_entry as date_entry, main.date_notes as date_notes, main.date_range_start as date_range_start, 
           main.date_range_end as date_range_end, main.findspot_region_search as findspot_region_search, main.findspot as findspot, main.context_search as context_search,
           main.material_search as material_search, main.medium as medium, main.refs as refs, main.keywords_technical as keywords_technical, 
           main.keywords_thematic as keywords_thematic, main.excel_row as excel_row, images.image_path as image_path, images.URL as url FROM main JOIN images ON main.id=images.id " . $SQL ;

 $result = $conn->query($query);
 if (!$result) die($conn->error);
 $rows = $result->num_rows;
 echo "Number of results: " . $rows;
 echo '<html>
<head>
<meta charset="UTF-8">

<link rel="stylesheet" href="wrapper.css">
<link rel="stylesheet" href="css/rSlider.min.css">

<link rel="stylesheet" href="css/style.css">
<script src="js/rSlider.min.js"></script>

<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
}
</style>
</head>
<body>';

echo '<div id="table-wrapper">
  <div id="table-scroll">
  <table class="table">';

 echo '<tr> <td> Id </td> <td>Title</td> <td>Number</td> <td> Medium </td> <td> Findspot Site </td> <td> Date </td>  <td> Date Entry</td>  <td> Date Notes</td> <td> Technical Features </td> <td> Thematic Features </td> <td> Image </td></tr>';

 for ($j = 0 ; $j < $rows ; $j++)
 {
    $result->data_seek($j);
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $imgInfo = GetImage($row['image_path']);
    echo '<tr><td>' . '<a href="https://ancmed.ulb.be/details.php?row=' . $row['id'] . '" target="_blank">' . $row['id'] . '</a></td>';
    echo '<td>' . $row['title'] . '</td>';
    echo '<td>' . $row['number'] . '</td>';
    echo '<td>' . $row['medium_search'] . '</td>';
    echo '<td>' . $row['findspot_site_search'] . '</td>';
    echo '<td>' . $row['date_absolute'] . '</td>';
    echo '<td>' . $row['date_entry'] . '</td>';
    echo '<td>' . $row['date_notes'] . '</td>';
    echo '<td>' . $row['keywords_technical'] . '</td>';
    echo '<td>' . $row['keywords_thematic'] . '</td>';
    echo '<td align="center"><a href="https://ancmed.ulb.be/details.php?row='  . $row['id'] . '" target="_blank"><img src="' . $imgInfo[0] . '" ' . $imgInfo[1] . '></td></tr>';
 }

 echo '</table>
 </div></div>
 <form method="post" action="fetchrow.php">
 <br>
 <table class="table">
<tr>
<td>Region</td>
<td>Medium</td>
<td>Material</td>
<td>Context</td>
<td>Technical Features</td>
<td>Thematic features</td>
<td>Decorative Filler</td>
<td>Ship Type</td>
<td>Figureheads</td>
<td>Findspot</td>
<td>General Search</td>
<td>Absolute Year</td>
</tr>
 <tr>
 <td style="height:120px">' . generate_select_list("Region", $region) .'</td>
 <td style="height:120px">' . generate_select_list("Medium", $medium) .'</td>
 <td style="height:120px">' . generate_select_list("Material", $material) .'</td>
 <td style="height:120px">' . generate_select_list("Context", $context) .'</td>
 <td style="height:120px">' . generate_select_list("TechnicalFeatures", $technical_features) .'</td>
 <td style="height:120px">' . generate_select_list("ThematicFeatures", $thematic_features) .'</td>
 <td style="height:120px">' . generate_select_list("DecorativeFiller", $decorative_filler) .'</td>
 <td style="height:120px">' . generate_select_list("ShipType", $ship_type) .'</td>
 <td style="height:120px">' . generate_select_list("Figureheads", $figureheads) .'</td>
 <td style="height:120px">' . generate_select_list("findspot", $findspot) .'</td>
 <td style="width:160px" "height:120px"> <input style="width:160px" name="general" id="general" type="text" value=' . $_POST['general'] . '></td>
 <td align="center" style="width:220px" "text-align:center" "height:120px"> <input style="width:190px" type="text" id="slider" class="slider"></td>
 <td style="width:150px"><input  style="width:150px" type="submit"></td></tr>
 <tr>
 <td><button type="button" onclick="removeOptRegion()" id="regionBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptMedium()" id="mediumBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptMaterial()" id="materialBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptContext()" id="contextBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptTechnicalFeatures()" id="techFeaturesBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptThematicFeatures()" id="themFeaturesBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptDecor()" id="decorBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptShipType()" id="shipTypeBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptFigureHeads()" id="figureHeadsBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptFindspot()" id="findspotBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptGenSearch()" id="genBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptSlider()" id="sliderBtn" style="width:100%">Clear</button></td>
 <td><button type="button" onclick="removeOptAll()" id="resetAllBtn" style="width:100%">Clear all</button></td>
 </tr>
 <input type="hidden" id="f1" name="f1" value="2000">
 <input type="hidden" id="f2" name="f2" value="500">
 </form>
 </body>
 <script>
 function removeOptRegion() { document.getElementById("Region").selectedIndex = "-1"; }
 function removeOptMedium() { document.getElementById("Medium").selectedIndex = "-1"; }
 function removeOptMaterial() { document.getElementById("Material").selectedIndex = "-1"; }
 function removeOptContext() { document.getElementById("Context").selectedIndex = "-1"; }
 function removeOptTechnicalFeatures() { document.getElementById("TechnicalFeatures").selectedIndex = "-1"; }
 function removeOptThematicFeatures() { document.getElementById("ThematicFeatures").selectedIndex = "-1"; }
 function removeOptDecor() { document.getElementById("DecorativeFiller").selectedIndex = "-1"; }
 function removeOptShipType() { document.getElementById("ShipType").selectedIndex = "-1"; }
 function removeOptFigureHeads() { document.getElementById("Figureheads").selectedIndex = "-1"; }
 function removeOptFindspot() { document.getElementById("findspot").selectedIndex = "-1"; }
 function removeOptGenSearch() { document.getElementById("general").value = ""; }
 function removeOptSlider() { mySlider.setValues(2000, 500); }
 
 function removeOptAll() 
 { 
   removeOptRegion();
   removeOptMedium();
   removeOptMaterial();
   removeOptContext();
   removeOptTechnicalFeatures();
   removeOptThematicFeatures();
   removeOptDecor();
   removeOptShipType();
   removeOptFigureHeads();
   removeOptFindspot();
   removeOptGenSearch();
   removeOptSlider();
 }
' .
"
function SliderChanged(values)
 {
   document.getElementById('f1').value = mySlider.getValueStart().toString();
   document.getElementById('f2').value = mySlider.getValueEnd().toString();
 }
 
 var mySlider = new rSlider({
   target: '#slider',
   values: [2000, 1950, 1900, 1850, 1800, 1750, 1700, 1650, 1600,1550, 1500, 1450, 
   1400, 1350, 1300, 1250, 1200, 1150, 1100, 1050, 1000, 950, 900, 850, 800, 750, 
   700, 650, 600, 550, 500],
   labels: false,
   scale: false,
   width:    190,
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
 </html>";

 $result->close();
 $conn->close();

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
    $sql = " (";
     foreach(((array)$_POST[$comboName] ) as $r)
     {
        $r = $sqlSeparator == "LIKE"? '%' . $r . '%' : $r ;
        $sql = $sql . ($i==0? "(" . $columnName  . " " . $sqlSeparator . ' "' : " OR (" . $columnName . " " . $sqlSeparator . ' "') . $r . '") ';
        $i ++;
     }
     $sql = $sql . ")"; 
   }
   return $sql;  
 }

 function GetImage($i)
 {
   $res = array();
   if($i == "")
   {
      array_push($res, "");
      array_push($res, 'width=0 height=0');
      return $res;
   }

   $filename = substr($i,1);

   // foreach (glob($path) as $filename) 
   {
      try
      {
         list($width, $height, $type, $attr) = getimagesize($filename);

         array_push($res, $filename);
         if($width > 300)
         {
            $width = 300;
            $height = 'auto';
         }
         
         array_push($res, 'width="' . $width . '" height="' . $height . '"');
         return $res ;      
     }
     catch(exception $e)
     {
      array_push($res, "");
      array_push($res, 'width=0 height=0');
      return $res;
     }
   }
   //array_push($res, "");
   //array_push($res, 'width=0 height=0');
   //return $res;
 }

?>