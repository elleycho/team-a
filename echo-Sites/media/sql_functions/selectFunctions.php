<?php
date_default_timezone_set('America/New_York');

function selectProgramType ($id)
{
  $sql = "SELECT * FROM programType WHERE ID='".$id."'";

  $result = mysql_query($sql);

  while($row = mysql_fetch_array($result)) {
    $name = $row['programType'];
  }

  return $name;
}

function selectServiceArea ($id)
{
  $sql = "SELECT * FROM serviceArea WHERE ID='".$id."'";

  $result = mysql_query($sql);

  while($row = mysql_fetch_array($result)) {
    $name = $row['serviceArea'];
  }

  return $name;
}

function selectContact ($id)
{
  $sql = "SELECT * FROM contact WHERE ID='".$id."'";

  $result = mysql_query($sql);

  while($row = mysql_fetch_array($result)) {
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $title = $row['title'];
  }
  $thisTitle = "";
  if ($title != null) {
    $thisTitle = ' (' + $title + ')';
  }

  return $firstName + ' ' + $lastName + $thisTitle;
}

function selectContactNumber ($id)
{
  $sql = "SELECT * FROM contactNumber WHERE ID='".$id."'";

  $result = mysql_query($sql);

  while($row = mysql_fetch_array($result)) {
    $number = $row['number'];
    $description = $row['description'];
  }

  $thisDesc = "";
  if ($description != null) {
    $thisDesc = '<b>' + $description + ':</b> ';
  }

  return $thisDesc + $number;
}

function selectKeyword ($resource_id)
{
  $sql = "SELECT * FROM keyword WHERE resource_ID='".$resource_id."'";

  $result = mysql_query($sql);

  $keywords = [];
  while($row = mysql_fetch_array($result)) {
    $keyword = $row['keyword'];
    array_push($keywords, $keyword);
  }

  return $keywords;
}

function selectDayOfWeek ($id)
{
  $sql = "SELECT * FROM dayOfWeek WHERE ID='".$id."'";

  $result = mysql_query($sql);

  while($row = mysql_fetch_array($result)) {
    $name = $row['dayOfWeek'];
  }

  return $name;
}

function selectRecurrence ($id)
{
  $sql = "SELECT * FROM monthRecurrence WHERE ID='".$id."'";

  $result = mysql_query($sql);

  while($row = mysql_fetch_array($result)) {
    $name = $row['recurrence'];
  }

  return $name;
}

function selectResourceServiceArea ($resource_id)
{
  $sql = "SELECT * FROM resource_serviceArea WHERE resource_ID = '".$resource_id."' ORDER BY serviceArea_ID";

  $result = mysql_query($sql);

  $areas = [];

  while($row = mysql_fetch_array($result)) {
    $id = $row['serviceArea_ID'];
    $serviceArea = selectServiceArea($id);
    array_push($areas, $serviceArea);
  }

  return $areas;
}

function selectResourceOperation ($resource_id)
{
  $sql = "SELECT * FROM operation WHERE resource_ID = '".$resource_id."' ORDER BY dayOfWeek_ID";

  $result = mysql_query($sql);

  $operation = [];

  while($row = mysql_fetch_array($result)) {
    $openHolidays = $row['openHolidays'];
    $recurrence = selectRecurrence($row['monthRecurrence_ID']);
    $notes = $row['notes'];
    $dayOfWeek = selectDayOfWeek($row['dayOfWeek_ID']);
    $startTime =  date('g:i a', strtotime($row['startTime']));
    $endTime = date('g:i a', strtotime($row['endTime']));


    $operationStr = "<p><b>$dayOfWeek:</b> $startTime - $endTime</p>";
    array_push($operation, $operationStr);
  }

  if ($openHolidays == 1) {
    $openHolidays = "<p class=\"text-success\"><b>Open Holidays</b></p>";
    array_push($operation, $openHolidays);
  }
  
  if ($recurrence != "weekly") {
    array_push($operation, $recurrence);
  }
  

  return $operation; 
}



?>