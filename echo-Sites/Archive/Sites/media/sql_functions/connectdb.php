<?php


	$dblocation = "127.0.0.1";
	$dbuser = "root";
	$dbpass = "cookies";
	$db = "SOWEGA";
	$link = "";	

	$link = mysql_connect($dblocation, $dbuser, $dbpass);
	if (!$link) {
   		die('DB Connection ERROR: ' . mysql_error());
	}

	$db_selected = mysql_selectdb($db, $link);
	if (!$db_selected) {
	    die ('Can\'t use SOWEGA DB: ' . mysql_error());
	}
	//echo 'DB Connection: Successful';
?>

