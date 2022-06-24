<?php //details.php
 require_once 'login.php';

 function debug_to_console($data) {
   $output = $data;
   if (is_array($output))
       $output = implode(',', $output);

   echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

 function GetImage($i)
 {
   foreach (glob("img/Images/" . $i .".*") as $filename) 
   {
      if($filename == "")
      return "";
      list($width, $height, $type, $attr) = getimagesize($filename);

      if($width > 1200)   
         return $filename . ' width="' . '1200' . '" height="' .'auto' . '"';
      if($height > 900)
         return $filename . ' width="' . 'auto' . '" height="' .'900' . '"';
      return $filename;
   }
 }

 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die($conn->connect_error);
 
 $q0 = "SET NAMES 'utf8'";
 $conn->query($q0);
 $q0 = "set CHARSET 'utf8'";
 $conn->query($q0);
$row = $_GET['row'];

 $query = "SELECT * FROM main where id=" . $row;
 $result = $conn->query($query);
 if (!$result) die($conn->error);

 $result->data_seek(0);
  
 $row2 = $result->fetch_array(MYSQLI_ASSOC);
 
// big tables
 $query = "SELECT * FROM general_desc where id=" . $row;
 $result = $conn->query($query);
 if (!$result) die($conn->error);

 $result->data_seek(0);
 $row_general_desc = $result->fetch_array(MYSQLI_NUM);

 $query = "SELECT * FROM tech_desc where id=" . $row;
 $result = $conn->query($query);
 if (!$result) die($conn->error);

 $result->data_seek(0);
 $row_tech_desc = $result->fetch_array(MYSQLI_NUM);

 $query = "SELECT * FROM disc where id=" . $row;
 $result = $conn->query($query);
 if (!$result) die($conn->error);

 $result->data_seek(0);
 $row_disc = $result->fetch_array(MYSQLI_NUM);
 $discussion = $row_disc[1];

 ?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns= "http://www.w3.org/1999/xhtml">
	<head>
    	<meta charset="utf-8">
		<meta name="google" content="notranslate">
		<meta http-equiv="Content-Language" content="en">
    	<meta name="description" content="AncMed: <?php echo $row2['number']; ?>">
    	<meta name="keywords" content="one, two, three">

		<title>AncMed: <?php echo $row2['number']; ?></title>

		<!-- external CSS link -->
		<link rel="shortcut icon" href="img/favicon.ico" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&family=Spartan:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/splide.min.css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<script src="https://kit.fontawesome.com/116673fe69.js" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://static.sketchfab.com/api/sketchfab-viewer-1.12.0.js"></script>
		<script src="../js/splide.min.js"></script>
	</head>
	<body>
		<header id="blurHeader">
			
			<div>
				<a href="index.html">
					<img src="img/logoonwhite.png" alt="AncMed Logo" class="logo">
					<h1>Ancient Mediterranean<br>
						Digital Project</h1>
				</a>
			</div>
			

			<nav id="menuButton" onclick="openNav()">
					<span></span>
					<span></span>
					<span></span>
			</nav>

			<nav class="staticNoAction">
					<span></span>
					<span></span>
					<span></span>
			</nav>

		</header>

		<div id="mySidenav" class="sidenav">

			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
				<nav>
					<span></span>
					<span></span>
					<span></span>
				</nav>
			</a>

			<div class="sideMenuLogo">
				<a href="index.html">
					<div>
						<img src="img/logoflatsmall.png" alt="AncMed Logo" class="logo">
						<h1>Ancient Mediterranean<br>
							Digital Project</h1>
					</div>
				</a>
			</div>

			<div class="sideMenuLinks">
				<div class="searchContainer">
					<form action="fetchrow.php" autocomplete="off">
						<button type="submit"><img src="img/searchiconsmall.png"></button>
						<input type="text" placeholder="Search Database..." name="search">
					</form>
				</div>
				<a href="index.html">Map</a>
				<a href="bibliography.php">Bibliography</a>
				<a href="submit.html">Submit</a>
				<a href="sponsors.html">Sponsors</a>
				<a href="about.html">About</a>
				<a href="donate.html">Donate</a>
			</div>
		</div>

		<section class="mainBody" id="blurMainBody">
			<section>
				<!-- <span class="backToResults"><i class="fa-solid fa-arrow-left-long"></i><a href=#>Search results</a></span> -->

				<h2>
				<?php
				echo $row2['title'];
				?>
				</h2>

				<section class="wrapper">
					<span class="listCategories">Cat. No.</span> <section><p>				
                        <?php echo $row2['number']; ?></p></section>
					<span class="listCategories">Date</span> <section><p>
                        <?php echo $row2['date_entry']; ?></p></section>
					<span class="listCategories">Findspot</span> <section><p>
                        <?php echo $row2['findspot']; ?></p></section>
                    <span class="listCategories">Dimensions</span> <section><p>
                        <?php echo $row2['dimensions']; ?></p></section>
                    <span class="listCategories">Medium</span> <section><p>
                        <?php echo $row2['medium']; ?></p></section>
					<span class="listCategories">Accession Number</span> <section><p>
                        <?php echo $row2['accession_number']; ?></p></section>
                    <span class="listCategories">References</span> <section><p>
                        <?php echo $row2['refs']; ?></p></section>
				</section>


				<section class="collapsingArea">

					<!-- Collapsible Stuff -->

					<section class="collapseBuffer">
						<button class="collapsible">Technical Description</button>
						<div class="content">
						<p><?php echo $row_tech_desc[1];?></p>
						</div>
					</section>

					<section class="collapseBuffer">	
						<button class="collapsible">General Description</button>
						<div class="content">
						<p><?php echo $row_general_desc[1];?></p>
						</div>
					</section>

					<section class="collapseBuffer">
						<button class="collapsible">Remarks</button>
						<div class="content">
						<p><?php echo $discussion;?></p>
                        </div>
					</section>

					<section class="collapseBuffer">	
						<button class="collapsible">Bibliography</button>
						<div class="content">
						  <p>
						<?php 
					 		if($row2['bibliography'] != '')
						  {
							$query = 'SELECT * FROM biblio WHERE id IN (' . $row2['bibliography'] . ') ORDER BY author, title';
							//echo $query . ' ' . $rows;
								$result = $conn->query($query);
							if (!$result) die($conn->error);
							$rows = $result->num_rows;
							
							$last_author ="";
							for ($j = 0 ; $j < $rows ; $j++)
							{
								$result->data_seek($j);
								$row3 = $result->fetch_array(MYSQLI_ASSOC);
								
								if($row3['author'] == $last_author)
									echo '<span class="spaceDelete">&#x2015;&#x2015;&#x2015;.</span> ' ;
								else
									echo $row3['author'] . ' ';

								$last_author = $row3['author'];
						  		echo $row3['title'] . '<br><br>';
							}/**/
						  }	 
							 ?>
							 
							 </p>
						</div>
					</section>

               <section>
						<button class="collapsible">Related Objects</button>
						<div class="content relatedObjects">

               <?php
               $related_objects = $row2["related_objects"];

               // debug_to_console($related_objects);
               if($related_objects != "")
               {
                  $get_related = 'SELECT main.id as main_id, main.title as title, main.number as number, main.medium_search as medium_search,
                  main.date_absolute as date_absolute, main.findspot_site_search as findspot_site_search,
                  main.medium as medium, images.image_path as image_path FROM main JOIN images ON main.id=images.id  WHERE main.id IN ( ' . $related_objects . ' )';
                  
                  $result = $conn->query($get_related);
                  if (!$result) die($conn->error);
                  
                  $rows = $result->num_rows;

                 for ($j = 0 ; $j < $rows ; $j++)
                  {
                     $result->data_seek($j);
                     $row = $result->fetch_array(MYSQLI_ASSOC);
                     
                     echo '<a href="https://ancmed.ulb.be/details.php?row=' . $row['main_id'] . '" ' . (($j - 1)%3 == 0 ? ' class="middleRelated" > ' : ' > ') . 
                              ' <section>
                                 <div class="thumbnailWrapper">';
                     echo ' <img src="' . (($row['image_path'] !="") ? substr($row['image_path'], 1) : "") . '">
                                 </div>' ;
                     echo '<h4>' . $row['medium_search'] . '</h4>';
                     echo '<div class="spanSpacer">';
                     echo '<span>' . $row['number'] . '</span>';
                     echo '<span class="greySpacer">|</span>';
                     echo '<span class="dateField">' . $row['date_absolute'] . '</span>';
                     echo '<span class="greySpacer">|</span>';
                     echo '<span>' . $row['findspot_site_search'] . '</span>';
                     echo ' </div>
                           </section>
                           </a>';
                  }
               }
               ?>

						</div>
					</section>
				</section>
			</section>
			<section class="gallerySection">
			  <?php 
			  //echo GetImage( $row2['excel_row']); 
			  echo '<div id="main-slider" class="splide">
						<div class="splide__track">
							<ul class="splide__list">';
			 
					if($row2['model3d'] != "")
					{
						$query = 'SELECT * FROM model_3d WHERE id IN (' . $row2['model3d'] . ')';
						$result = $conn->query($query);
						if (!$result) die($conn->error);
						$rowsMod = $result->num_rows;
						
						for ($j = 0 ; $j < $rowsMod ; $j++)
						{
							$result->data_seek($j);
							$rowMod = $result->fetch_array(MYSQLI_ASSOC);
							
							$iframe = $rowMod['3d_model_html'];
							echo '<li class="splide__slide">' . $iframe;
					
							echo   '<p>3D Model View</p>
								<div>
									<!-- <i class="fa-solid fa-share-nodes"></i> -->
								</div>
							</li>';
						}
					}

					if($row2['images'] != "")
					{
						$query = 'SELECT * FROM image_table WHERE id IN (' . $row2['images'] . ')';
						$result = $conn->query($query);
						if (!$result) die($conn->error);
						$rowsImg = $result->num_rows;
						
						for ($j = 0 ; $j < $rowsImg ; $j++)
						{
							$result->data_seek($j);
							$rowImg = $result->fetch_array(MYSQLI_ASSOC);
							
							// debug_to_console($rowImg['file_path']);	

							echo '<li class="splide__slide">';
							echo '<img src="' . $rowImg['file_path'] . '"  onclick="openLightbox();toSlide(1)">';
							echo '<p>' . $rowImg['image_description'] . '</p>
								<div>
									<img  class="tooltip mainImageIcons" src="img/copyright_thin_icon_small.png" alt="copyright icon">
									<span class="tooltiptext">&copy; ' . $rowImg['copyright_information'] . '</span>
									<img class="mainImageIcons" src="img/fullscreen-icon-grey-small.png" alt="Click for fullscreen" title="click for fullscreen" onclick="openLightbox();toSlide(1)">
								</div>
							</li>';
						}
						
						echo '</ul>
							</div>
						</div>';

						echo '<section class="flexContainer">
								<div id="thumbnail-slider" class="splide">
								<div class="splide__track">
									<ul class="splide__list">';

						for ($j = 0 ; $j < $rowsImg ; $j++)
						{
							$result->data_seek($j);
							$rowImg = $result->fetch_array(MYSQLI_ASSOC);
						
							echo '<li class="splide__slide">
								<img src="'. $rowImg['file_path'] . '">
								</li>';
						}

						echo '			</ul>
									</div>
								</div>
							</section>
						</section>
					</section>';

						echo '<div id="Lightbox" class="modal">
						<span class="close pointer" onclick="closeLightbox()">&times;</span>
						<div class="modal-content">';

						for ($j = 0 ; $j < $rowsImg ; $j++)
						{
							$result->data_seek($j);
							$rowImg = $result->fetch_array(MYSQLI_ASSOC);
						
							echo '<div class="slide">
								<img src="'. $rowImg['file_path'] . '" class="image-slide" alt="Side B" />
								</div>';
						}

						echo '<div class="dots">';

						for ($j = 0 ; $j < $rowsImg ; $j++)
						{
							$result->data_seek($j);
							$rowImg = $result->fetch_array(MYSQLI_ASSOC);
						
							echo '<div class="col">
									<img src="'. $rowImg['file_path'] . '" class="modal-preview" onclick="toSlide(1)" alt="Side A">
								</div>';
						}
					}
				 
                  $result->close();
                  $conn->close();
			 
			 ?>
		</div>
	</div>
</div>


		<footer id="blurFooter">

			<ul class="navigation">

				<li class="invisible leftGutter socialMedia"><i class="fa-brands fa-twitter"></i></li>
				<li class="invisible leftAlign socialMedia"><i class="fa-brands fa-twitter"></i></li>

				<li><a href="../index.html">Home</a></li>
				<li><a href="../fetchrow.php">Search Database</a></li>
				<li><a href="../submit.html">Submit</a></li>
				<li><a href="../sponsors.html">Sponsors</a></li>
				<li><a href="../about.html">About</a></li>
				<li><a href="../donate.html">Donate</a></li>

				<li class="rightAlign socialMedia"><a href="https://twitter.com/Anc_Med" alt="Twitter Profile"><i class="fa-brands fa-twitter"></i></a></li>
				<li class="socialMedia rightGutter"><a href="https://sketchfab.com/tz.manolova" alt="Sketchfab Profile"><i class="fa-solid fa-cube"></i></a></li>

			</ul>

			<p>&copy; 2022 - Ancient Mediterranean Digital Project</p>

		</footer>


		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
