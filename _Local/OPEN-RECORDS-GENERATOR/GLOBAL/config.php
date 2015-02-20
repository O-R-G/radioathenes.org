<?php








  ///////////////////
 //  DB Settings  //
///////////////////

	// Client Name
	$dbClient = "OPEN-RECORDS-GENERATOR";

	// Client Color

	$dbColor = "000";
	$dbColor2 = "666";
	$dbColor3 = "333";
		
	// Client Username and Password -- read only
	$dbUser1 = "guest";
	$dbPass1 = "guest";

	// Client Username and Password -- read / write
	$dbUser2 = "main";
	$dbPass2 = "main";

	// Client Username and Password -- main
	$dbUser3 = "admin";
	$dbPass3 = "admin";

	// Database Start Date/Time
	$dbStart = mktime(15, 25, 00, 03, 26, 2014);
	// (hour, minute, second, month, day, year)

	// Client URL
	$dbHost = "http://localhost/TEMPLECONTEMPORARY/";

	// DB Admin
	$dbAdmin = $dbHost ."OPEN-RECORDS-GENERATOR/";

	// DB Media
	$dbMedia = $dbHost ."MEDIA/";
	// Don't forget to set the permissions on this folder!







  ////////////////
 //  Database  //
////////////////

function dbConnectMain($dbUser) {

	$dbMainHost = "localhost";
	$dbMainDbse = "templecontemp_local";

	if 		($dbUser == 1) {		$dbMainUser = "root"; 	$dbMainPass = ""; 
}
	else if ($dbUser == 2) {		$dbMainUser = "root"; 	$dbMainPass = ""; 
}
	else if ($dbUser == 3) {		$dbMainUser = "root";   	$dbMainPass = ""; 
}

	$dbConnect = MYSQL_CONNECT($dbMainHost, $dbMainUser, $dbMainPass);
	MYSQL_SELECT_DB($dbMainDbse, $dbConnect);
}



?>
