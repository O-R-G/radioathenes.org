<?php 
	// require_once("_Library/systemDatabase.php"); 
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

	// $animate = $_REQUEST['animate'];
	// if (!$animate) $animate = "true";
	
	// Live?
	
	// $live is stored in database and turns on site
	// $dev is passed in query and stored in cookie

	$dev = TRUE;
	// $dev = $_REQUEST['dev'];
	// $dev = systemCookie("devCookie", $dev, 0);
	// if (!$dev) die('Under construction . . .');
	
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
	<!-- <script type="text/javascript" src="JS/animateMessage.js"></script> -->
</head>

<body>

<div id="name" class="helvetica">
RADIO ATHÈNES<br />
Petraki 15<br />  
Athens 10563<br />  
+30 6946 687907<br />  
</div>






