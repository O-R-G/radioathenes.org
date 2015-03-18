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
 	<meta name="viewport" content="user-scalable=no, width=device-width">
	<link rel="stylesheet" type="text/css" media="all" href="GLOBAL/global.css" />
	<script type="text/javascript" src="JS/global.js"></script>
	<script type="text/javascript" src="JS/radioControl.js"></script>
</head>

<body>

	<!-- NAME -->

	<div id="name" class="mtdbt2f4d-915 plain">
		<a href="<?php echo ($pageName == 'about') ? 'index' : 'about' ?>.php">RADIO ATHÈNES</a>
	</div>



	<!-- VIDEO -->
        	
	<div>
		<video id="radio" width="480" height="360" poster="MEDIA/loading.gif" autoplay loop>
			<source src="MEDIA/MP4/radio.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>



	<!-- CONTROLS -->

	<div id="controls" class="mtdbt2f4d-915 plain">
		<a href="javascript:radioOnOff();">&times</a>
	</div>






