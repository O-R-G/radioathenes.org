<?php 
	date_default_timezone_set("Europe/Athens");
	// require_once("_Library/systemDatabase.php"); 

	require_once(__DIR__ . "/../open-records-generator/config/config.php");
	require_once(__DIR__ . '/../config/views.php');
	require_once(__DIR__ . '/../_Library/SiteMeta.php');
	
	require_once("_Library/systemCookie.php");
	require_once("_Library/displayNavigation.php"); 
	require_once("_Library/displayMedia.php"); 

	$db = db_connect("guest");
	$oo = new Objects();
	$uu = new URL();

	$item = null;
	if($uu->id){
		$item = $oo->get($uu->id);
	}

	$view = getView($uri);
	
	if($view === "404") {
		http_response_code(404);
	}
	// if(is_array($page_config['stylesheets']))
	// 	$page_config['stylesheets'][] = "main";
	// else if(is_string($page_config['stylesheets']))
	// 	$page_config['stylesheets'] = [$page_config['stylesheets'], 'main'];

	$siteMeta = new SiteMeta($db, $view, $item);

	
	
	// Live?
	
	// $live is stored in database and turns on site
	// $dev is passed in query and stored in cookie

	// $dev = TRUE;
	/// $dev = $_REQUEST['dev'];
	// $dev = systemCookie("devCookie", $dev, 0);
	// if (!$dev) die('Under construction . . .');
	
	// Alt for dev options
	
	$alt = $_REQUEST['alt'] ?? '';

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
	<?php 
		echo $siteMeta->generate(); 
		// if($useGTM) echo $siteMeta->gtm_head;
	?>
	<link rel="stylesheet" type="text/css" media="all" href="GLOBAL/global.css" />
	<script type="text/javascript" src="JS/global.js"></script>
	<!-- <script type="text/javascript" src="JS/radioControl.js"></script> -->
	<script type="text/javascript" src="JS/playPause.js"></script>
</head>

<body onclick="playVideo();">

	<!-- NAME -->

	<div id="name" class="mtdbt2f4d-915 plain">
		<?php 
			$head_url = $view === 'home' ? '/about' : '/';
		?>
		<a href="<?php echo $head_url; ?>">RADIO ATHÈNES</a>
	</div>


	<!-- VIDEO -->
	<div>
		<video id="radio" width="480" height="360" poster="MEDIA/loading.gif" playsinline>
			<source src="MEDIA/MP4/radio.mp4" type="video/mp4">
			Your browser does not support the video tag.
		</video>
	</div>


	<!-- CONTROLS -->

	<div id="controls" class="mtdbt2f4d-915 plain">
		<a href="javascript:radioOnOff();">&times</a>
	</div>

	<!-- ** redundant! **
    	<div class="video-player" align="center">
        	<video src="MEDIA/MP4/radio.mp4" poster="poster.jpg"></video>
    	</div>
	-->

