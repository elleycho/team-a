<?php
	//ADD a Resource
	$name = $_POST["name"];
	$street1 = $_POST["street1"];
	$street2 = $_POST["street2"];
	$zip = $_POST["zip"];
	$city = $_POST["city"];
	$programType = $_POST["programType"];
	$website = $_POST["website"];
	$purpose = $_POST["purpose"];
	$mission = $_POST["mission"];
	$description = $_POST["description"];
	$eligibility = $_POST["eligibility"];
	$fees = $_POST["fees"];

	include "insertFunctions.php";

	$id = insertResource ($name, $street1, $street2, $city, $zip, $programType, $website, $purpose, $mission, $description, $eligibility, $fees);
	echo "$id";
?>