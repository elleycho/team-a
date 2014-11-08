<?php

function insertProgramType ($program)
{
  include "connectdb.php";

  $sql = "INSERT INTO programType (programType) VALUES ('".$program."')";

  $result = mysql_query($sql);

  if (!$result)
  {
    if (mysql_errno() == 1062)
    {
      die('ERROR: Duplicate Program Type entry for ' . $program);
    }
    else
    {
      die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
    }
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  if ($newId != null) {
    return $newId;
  }
}

function insertServiceArea ($servicearea)
{
  include "connectdb.php";

  $sql = "INSERT INTO serviceArea (serviceArea) VALUES ('".$serviceArea."')";

  $result = mysql_query($sql);

  if (!$result)
  {
    if (mysql_errno() == 1062)
    {
      die('ERROR: Duplicate Service Area entry for ' . $serviceArea);
    }
    else
    {
      die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
    }
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  if ($newId != null) {
    return $newId;
  }
}

function insertContact ($firstname, $lastname, $title, $resource_id)
{
  include "connectdb.php";

  $sql = "INSERT INTO contact (firstName, lastName, title, resource_ID) VALUES ('".$firstName."','".$lastName."','".$title."','".$resource_id."')";

  $result = mysql_query($sql);

  if (!$result)
  {
    if (mysql_errno() == 1062)
    {
      die('ERROR: Duplicate Contact entry for ' . $firstName . ' ' . $lastName);
    }
    else
    {
      die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
    }
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  if ($newId != null) {
    return $newId;
  }
}

function insertContactNumber ($number, $description, $resource_id)
{
  include "connectdb.php";

  $sql = "INSERT INTO contactNumber (number, description, resource_ID) VALUES ('".$number."','".$description."','".$resource_id."')";

  $result = mysql_query($sql);

  //GET CONTACT
  $getResourceSql = "SELECT * FROM resource WHERE ID = $resource_id";
  $resourceList = mysql_query($getResourceSql);

  while($resource = mysql_fetch_array($resourceList)) {
    $name = $resource['name'];
  }

  if (!$result)
  {
    if (mysql_errno() == 1062)
    {
      die('ERROR: Duplicate Contact Number entry for Resource: ' . $name);
    }
    else
    {
      die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
    }
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  if ($newId != null) {
    return $newId;
  }
}

function insertResourceKeyword ($keyword, $resource_id)
{
  include "connectdb.php";

  $sql = "INSERT INTO keyword (keyword, resource_ID) VALUES ('".$keyword."','".$resource_id."')";

  $result = mysql_query($sql);

  //GET RESOURCE
  $getResourceSql = "SELECT * FROM resource WHERE ID = $resource_id";
  $resourceList = mysql_query($getResourceSql);

  while($resource = mysql_fetch_array($resourceList)) {
    $resourcename = $resource['name'];
  }

  if (!$result)
  {
    if (mysql_errno() == 1062)
    {
      die('ERROR: Duplicate Resource - Keyword entry for Resource: ' . $resourcename . ' (Keyword: ' . $keyword . ')');
    }
    else
    {
      die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
    }
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  if ($newId != null) {
    return $newId;
  }
}

function insertResourceServiceArea ($resource_id, $serviceArea_id, $notes)
{
  include "connectdb.php";

  $sql = "INSERT INTO resource_serviceArea (resource_ID, serviceArea_ID, notes) VALUES ('".$resource_id."','".$serviceArea_id."','".$notes."')";

  $result = mysql_query($sql);

  //GET RESOURCE
  $getResourceSql = "SELECT * FROM resource WHERE ID = $resource_id";
  $resourceList = mysql_query($getResourceSql);

  while($resource = mysql_fetch_array($resourceList)) {
    $resourcename = $resource['name'];
  }

  //GET SERVICEAREA
  $getServiceAreaSql = "SELECT * FROM serviceArea WHERE ID = $serviceArea_id";
  $serviceAreaList = mysql_query($getServiceArea);

  while($serviceArea = mysql_fetch_array($serviceAreaList)) {
    $serviceAreaName = $serviceArea['serviceArea'];
  }

  if (!$result)
  {
    if (mysql_errno() == 1062)
    {
      die('ERROR: Duplicate Resource - Service Area entry for Resource: ' . $resourcename . ' (Service Area: ' . $serviceArea_id . ')');
    }
    else
    {
      die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
    }
  }

  mysql_close($link);
}

function insertResource ($name, $street1, $street2, $city, $zip, $program_id, $contact_id, $websiteURL, $purpose, $mission, $description, $eligibility, $fees)
{
  include "connectdb.php";

  $sql = "INSERT INTO resource (name, street1, street2, city, zipcode, programType_ID, contact_ID, website, purpose, mission, description, eligibility, fees) 
              VALUES ('".$name."','".$street1."','".$street2."','".$city."','".$zipcode."','".$program_id."','".$contact_id."','".$websiteURL."','".$purpose."','".$mission."','".$description."','".$eligibility."','".$fees."')";

  $result = mysql_query($sql);

  if (!$result)
  {
    die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  if ($newId != null) {
    return $newId;
  }
}

function insertResourceOperation ($resource_id, $startTime, $endTime, $dayOfWeek, $monthRecurrence, $openHolidays, $notes)
{
  include "connectdb.php";

  $sql = "INSERT INTO operation (resource_ID, startTime, endTime, dayOfWeek_ID, monthRecurrence_ID, openHolidays, notes) 
              VALUES ('".$resource_id."','".$startTime."','".$endTime."','".$dayOfWeek."','".$monthRecurrence."','".$openHolidays."','".$notes."')";

  $result = mysql_query($sql);

  if (!$result)
  {
    die('ERROR: ' . mysql_error() . '--> ERROR NO: ' . mysql_errno());
  }
  else 
  {
    $newId  = mysql_insert_id();
  }

  mysql_close($link);

  
}

?>