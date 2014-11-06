<?php


	$dblocation = "192.185.35.252";
	$dbuser = "shodez83_wrdp17";
	$dbpass = "S76ocaY8Xty6L0g";
	$db = "SOWEGA";
	$link = "";	

	$link = mysql_connect($dblocation, $dbuser, $dbpass);
	if (!$link) {
   		die('DB Connection ERROR: ' . mysql_error());
	}

	$db_selected = mysql_selectdb($db, $link);
	if (!$db_selected) {
	    die ('Can\'t use APPUIDDB: ' . mysql_error());
	}
	//echo 'DB Connection: Successful';
?>

