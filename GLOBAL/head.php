<?php 
	date_default_timezone_set("Europe/Athens");
	require_once("_Library/systemDatabase.php"); 
	require_once("_Library/systemCookie.php");
	require_once("_Library/displayNavigation.php"); 
	require_once("_Library/displayMedia.php"); 

	// Parse $id

	$id = $_REQUEST['id'];		// no register globals	
	if (!$id) $id = "2";
	$ids = explode(",", $id);
	$idFull = $id;
	$id = $ids[count($ids) - 1];
	$pageName = basename($_SERVER['PHP_SELF'], ".php");
	
	// Live?
	
	// $live is stored in database and turns on site
	// $dev is passed in query and stored in cookie

	// $dev = TRUE;
	$dev = $_REQUEST['dev'];
	$dev = systemCookie("devCookie", $dev, 0);
	if (!$dev) die('Under construction . . .');
	
	// Alt for dev options
	
	$alt = $_REQUEST['alt'];

	$documentTitle = "Radio Athènes";

	/*
	$staging = $_REQUEST['staging'];
	$sql    = "SELECT deck FROM objects WHERE objects.name1 LIKE 'Live';";
	$result =  MYSQL_QUERY($sql);
	$myrow  =  MYSQL_FETCH_ARRAY($result);
	$deck = $myrow["deck"];
	if ( $deck == 'TRUE' ) $live = TRUE;
	*/
	
	echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n"; 
?>


<!DOCTYPE html PUBLIC "-//W3C//Dtd XHTML 1.0 Transitional//EN" "http://www.w3.org/tr/xhtml1/Dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
	<title><?php echo $documentTitle; ?></title>
	<meta http-equiv="Content-Type" content="text/xhtml; charset=utf-8" />
	<meta http-equiv="Title" content="<?php echo $documentTitle; ?>" />		
	<meta name="viewport" content="width=400">
	<link rel="stylesheet" type="text/css" media="all" href="GLOBAL/global.css" />
	<script type="text/javascript" src="GLOBAL/global.js"></script>
	<script type="text/javascript" src="JS/radioControl.js"></script>
</head>

<body>

<div id="name" class="mtdbt2f-PP">
	<a href="index.php">RADIO ATHÈNES</a>
</div>


        <!-- VIDEO -->
        
	<div>
		<video id="radio" width="480" height="360" autoplay loop>
			<source src="MEDIA/MP4/radio.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>


<!-- MENU -->

<?php

	// SQL objects from rootid

	$rootid = 1;
	
	$sql = "SELECT objects.id AS objectsId, objects.name1, objects.deck, objects.body, objects.end, objects.begin, 
objects.active, objects.rank as objectsRank, wires.fromid, wires.toid FROM objects, wires WHERE wires.fromid = $rootid AND wires.toid 
= objects.id AND objects.active = '1' AND wires.active = '1' ORDER BY objects.rank;";
	              
	/* 
        // SQL object plus media from root with rootname

	$rootid = 1;

        $sql = "SELECT objects.id AS objectsId, objects.name1, objects.deck, objects.body, objects.notes, objects.active, 
objects.begin, objects.end, objects.rank as objectsRank, (SELECT objects.name1 FROM objects WHERE objects.id = $rootid) AS rootname, 
media.id AS mediaId, media.object AS mediaObject, media.type, media.caption, media.active AS mediaActive, media.rank FROM objects 
LEFT JOIN media ON objects.id = media.object AND media.active = 1 WHERE wires.fromid = '1' AND wires.toid = objects.id AND 
objects.active = '1' AND wires.active = '1' ORDER BY media.rank;";
	*/

	$result =  MYSQL_QUERY($sql);
	$html = "";
	$i = 0;

	$html .= "<div id = 'menuContainer' class = 'mtdbt2f-PP'>";

	while ( $myrow = MYSQL_FETCH_ARRAY($result) ) {


		$html .= "<div class='active'>";
		$html .= "<a onmousedown='objectShow(\"line$i\");' href='#null'>" . "<span class='black'>" . date('Y.d.m H:i', strtotime($myrow['begin'])) . " / </span>" . $myrow["name1"] . "</a>";
		$html .= "</div>";
	
		// $html .= "<br />";	
		
		// ** use overflow:hidden css to make appear and disappear, collapsing menu **

		$html .= "<div id='line$i' class='bodyContainer hide'>" . $myrow['body'] . "</div>";	

		$i++;
	}

	$html .= "</div>";
	echo nl2br($html);
?>



<!-- CONTROLS -->

<div id="controls" class="mtdbt2f-PP">
	<a href="javascript:radioOnOff();">&times</a>
</div>






