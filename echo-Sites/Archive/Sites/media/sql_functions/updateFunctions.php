<?php

function updateProgramType($id, $program){
    include "connectdb.php";

    $sql = "UPDATE programType SET programType='".$program."' WHERE ID='".$id."'";
    $result = mysql_query($sql);

    mysql_close($link);
}

function updateServiceArea($id, $serviceArea){
    include "connectdb.php";

    $sql = "UPDATE serviceArea SET serviceArea='".$serviceArea."' WHERE ID='".$id."'";
    $result = mysql_query($sql);

    mysql_close($link);
}

function updateContact($id, $firstname, $lastname, $title){
    include "connectdb.php";

    $sql = "UPDATE contact SET firstName='".$firstname."', SET lastName='".$lastname."', SET title='".$title."' WHERE ID='".$id."'";
    $result = mysql_query($sql);

    mysql_close($link);
}

function updateContactNumber($id, $number, $description, $resource_id){
    include "connectdb.php";

    $sql = "UPDATE contactNumber SET number='".$number."', SET description='".$description."', SET resource_ID='".$resource_id."' WHERE ID='".$id."'";
    $result = mysql_query($sql);

    mysql_close($link);
}

function updateResourceKeyword ($id, $keyword, $resource_id){
	include "connectdb.php";

    $sql = "UPDATE keyword SET keyword='".$keyword."' WHERE ID='".$id."' AND resource_ID='".$resource_id."'";
    $result = mysql_query($sql);

    mysql_close($link);
}


function updateResourceServiceArea ($resource_id, $serviceArea_id, $notes)
{
	include "connectdb.php";

	$sql = "UPDATE resource_serviceArea SET notes='".$notes."' WHERE resource_ID='".$resource_id."' AND serviceArea_ID='".$serviceArea_id."'";
	$result = mysql_query($sql);

    mysql_close($link);
}

function updateResource ($id, $name, $street1, $street2, $city, $zip, $program_id, $contact_id, $websiteURL, $purpose, $mission, $description, $eligibility, $fees)
{
  	include "connectdb.php";

  	$sql = "UPDATE resource SET name='".$name."', SET street1='".$street1."', SET street2='".$street2."', SET city='".$city."', SET zipcode='".$zip."', SET programType_ID='".$program_id."', SET contact_ID='".$contact_id."', SET website='".$websiteURL."', SET purpose='".$purpose."', SET mission='".$mission."', SET description='".$description."', SET eligibility='".$eligibility."', SET fees='".$fees."' WHERE ID='".$id."'";
	$result = mysql_query($sql);

    mysql_close($link);
}

function updateResourceOperation ($id, $resource_id, $startTime, $endTime, $dayOfWeek, $monthRecurrence, $openHolidays, $notes)
{
	include "connectdb.php";

  	$sql = "UPDATE operation SET resource_ID='".$name."', SET startTime='".$name."', SET endTime='".$name."', SET dayOfWeek_ID='".$name."', SET monthRecurrence_ID='".$name."', SET openHolidays='".$name."', SET notes='".$name."' WHERE ID='".$id."'";
	$result = mysql_query($sql);

    mysql_close($link);
}

?>