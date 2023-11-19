<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta name="description" content="Bibliography Page; AncMed">
    	<meta property="og:title" content="The Ancient Mediterranean Digital Project">
		<meta property="og:type" content="article" />
		<meta property="og:description" content="An open access database on ancient Mediterranean ships">
		<meta property="og:image" content="https://ancmed.ulb.be/ancmed_logo_social_media.jpg">
		<meta property="og:url" content="https://ancmed.ulb.be/">
		<meta name="twitter:card" content="Ancmed Logo">

		<title>AncMed: Bibliography</title>
		<link rel="shortcut icon" href="img/favicon.ico" />

		<!-- fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@300&family=Spartan:wght@100;300;400;500;600;700&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/116673fe69.js" crossorigin="anonymous"></script>

		<!-- stylesheets -->
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/navmenu.css">
		<link rel="stylesheet" href="css/bibliography.css">
	</head>

	<body>
		<header id="blurHeader">
			
			<div>
				<a href="index.php">
					<img src="img/logoonwhite.png" alt="AncMed Logo" class="logo">
					<section class="logoTextContainer">
         				<h1>Ancient Mediterranean</h1>
         				<h1>Digital Project</h1>
      				</section>
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
				<a href="index.php">
					<div>
						<img src="img/logoflatsmall.png" alt="AncMed Logo" class="logo">
						<section class="logoTextContainer">
         					<h1>Ancient Mediterranean</h1>
         					<h1>Digital Project</h1>
      					</section>
					</div>
				</a>
			</div>

			<div class="sideMenuLinks">
				<div class="searchContainer">
					<form action="/search.html" autocomplete="off">
						<button type="submit"><img src="img/searchiconsmall.png"></button>
						<input type="text" placeholder="Search Database..." name="search">
					</form>
				</div>
				<a href="index.php">Map</a>
				<a href="search.php">Advanced Search</a>
				<a href="bibliography.php">Bibliography</a>
				<a href="glossary.html">Glossary</a>
				<a href="submit.html">Submit</a>
				<a href="sponsors.html">Sponsors</a>
				<a href="about.html">About</a>
				<a href="https://www.paypal.com/donate/?hosted_button_id=4WEMKS7KGC9MG">Donate</a>
			</div>
		</div>

		<section class="mainBody" id="blurMainBody">

			<section class="alphabet">
				<h3>
					<a href="#A">A</a>
					<a href="#B">B</a>
					<a href="#C">C</a>
					<a href="#D">D</a>
					<a href="#E">E</a>
					<a href="#F">F</a>
					<a href="#G">G</a>
					<a href="#H">H</a>
					<a href="#I">I</a>
					<a href="#J">J</a>
					<a href="#K">K</a>
					<a href="#L">L</a>
					<a href="#M">M</a>
					<a href="#N">N</a>
					<a href="#O">O</a>
					<a href="#P">P</a>
					<a href="#Q">Q</a>
					<a href="#R">R</a>
					<a href="#S">S</a>
					<a href="#T">T</a>
					<a href="#U">U</a>
					<a href="#V">V</a>
					<a href="#W">W</a>
					<a href="#X">X</a>
					<a href="#Y">Y</a>
					<a href="#Z">Z</a>
				</h3>
			</section>

			<section class="keyReadings">
				<h2>Major Synthetic Works</h2>
				<div class="entryWrapper">
					<p><strong>Basch, L.</strong> 1987. <em>Le musée imaginaire de la marine antique.</em> Athens: Institut Hellénique pour la préservation de la tradition nautique.</p><a href="Bibliography/Basch, Musée imaginaire (1987) Chapters 1-4.pdf"><img class="downloadIcon" src="img/pdf_icon.png" alt="download available"></a>
					<p><strong>Gray, D.</strong> 1974.  <em>Seewesen.</em> Göttingen: Vandenhoeck und Ruprecht.</p><a href="#"><img class="downloadIcon" src="img/pdf_icon_grey.png" alt="download not available" title="download not available"></a>
					<p><strong>Wachsmann, S.</strong> 1998. <em>Seagoing Ships & Seamanship in the Bronze Age Levant.</em> College Station, TX: Texas A&M University Press.</p><a href="#"><img class="downloadIcon" src="img/pdf_icon_grey.png" alt="download not available" title="download not available"></a>
					<p><strong>Wedde, M.</strong> 2000.  <em>Towards a Hermeneutics of Aegean Bronze Age Ship Imagery.</em> Peleus Studien zur Archäologie und Geschichte Griechenlands und Zyperns, vol. 6. Bibliopolis: Mannheim and Möhnsee.</p><a href="#"><img class="downloadIcon" src="img/pdf_icon_grey.png" alt="download not available" title="download not available"></a>
					<p><strong>Westerberg, K.</strong> 1983. <em>Cypriote Ships from the Bronze Age to c. 500 B.C. </em> SIMA, Pocket-books, 22. Göteborg: P. Åströms förlag.</p><a href="#"><img class="downloadIcon" src="img/pdf_icon_grey.png" alt="download not available" title="download not available"></a>
				</div>
			</section>

			<?php
			require_once 'login.php';
			$alphabet = array( "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O",
								"P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z" );
			
			$conn = new mysqli($hn, $un, $pw, $db);
			if ($conn->connect_error) die($conn->connect_error);

			$q0 = "SET NAMES 'utf8'";
			$conn->query($q0);
			$q0 = "set CHARSET 'utf8'";
			$conn->query($q0);

			$query = "SELECT * FROM biblio ORDER BY author, title";
			$result = $conn->query($query);
			if (!$result) die($conn->error);

			$rows = $result->num_rows;
			// $rowEntries = array();
			$prevAuth = "";
			$currentLetter = $alphabet[0];
			
			echo '<section id='. $currentLetter .'>
				<h2 class="sectionLetter">' . $currentLetter . '</h2>';
			
			for ($j = 0 ; $j < $rows ; $j++)
			{
				$result->data_seek($j);
				$row = $result->fetch_array(MYSQLI_ASSOC);					

				$authLetter = $row['author'][0];
				if($authLetter != $currentLetter && $authLetter != utf8_encode('Ö')[0] && $authLetter != utf8_encode('Å')[0] && $authLetter != utf8_encode('Ç')[0])
				{
					if($currentLetter != 'A')
						echo '</section>';
					echo '<section id="'. $authLetter .'">
						<br><h2 class="sectionLetter">' . $authLetter . '</h2>';
					$currentLetter	= $authLetter;
				}

				$authSame = $row['author'] == $prevAuth;
				$linkExists = $row['link'] != "";

				if(!$authSame)
				{
					if($prevAuth != "")
						echo '</div>';
					echo '<div class="entryWrapper">
						<div class="entryStart">
							<h4 class="authorName">' .  $row['author'] . '</h4>';
					echo '<p>' . $row['title'] . '</p>' ;
					echo '</div><a href="' .  (!$linkExists? '#' : $row['link']) . '">';
					echo '<img class="downloadIcon" src=' . ($linkExists ?  '"img/pdf_icon.png" alt="download available"' : '"img/pdf_icon_grey.png"  alt="download not available"') . '></a>';
				
				}
				else
				{
					echo '<p><span class="spaceDelete">&#x2015;&#x2015;&#x2015;.</span>' . $row['title'] . '</p>'; 
					echo '<a href="' .  (!$linkExists? '#' : $row['link']) . '">';
					echo '<img class="downloadIcon" src=' . ($linkExists?  '"img/pdf_icon.png"  alt="download available"' : '"img/pdf_icon_grey.png" alt="download not available"') .  '></a>';	
				}
				$prevAuth = $row['author'];
			}
			echo '</div>';
			echo '</section>';
			?>
	
			
		</section>



		<footer id="blurFooter">

			<ul class="navigation">

				<li class="invisible leftGutter socialMedia"><i class="fa-brands fa-twitter"></i></li>
				<li class="invisible leftAlign socialMedia"><i class="fa-brands fa-twitter"></i></li>

				<li><a href="index.php">Home</a></li>
				<li><a href="search.php">Search Database</a></li>
				<li><a href="submit.html">Submit</a></li>
				<li><a href="sponsors.html">Sponsors</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="https://www.paypal.com/donate/?hosted_button_id=4WEMKS7KGC9MG">Donate</a></li>

				<li class="rightAlign socialMedia"><a href="https://twitter.com/Anc_Med" alt="Twitter Profile"><i class="fa-brands fa-twitter"></i></a></li>
				<li class="socialMedia rightGutter"><a href="https://sketchfab.com/tz.manolova" alt="Sketchfab Profile"><i class="fa-solid fa-cube"></i></a></li>

			</ul>

			<p>&copy; 2022 - Ancient Mediterranean Digital Project</p>

		</footer>


		<script type="text/javascript" src="js/main.js"></script>
	</body>
</html>
