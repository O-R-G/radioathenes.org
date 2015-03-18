<?php



  ////////////////
 //  Database  //
////////////////

function systemDatabase() {

	$dbMainHost = "localhost";
	$dbMainUser = "radioa_m";
	$dbMainPass = "hZqd9MTeSn4T";
	$dbMainDbse = "radioa_radioathenes";

	$dbConnect = MYSQL_CONNECT($dbMainHost, $dbMainUser, $dbMainPass);
	MYSQL_SELECT_DB($dbMainDbse, $dbConnect);
}
systemDatabase();



?>
