<?php

//error notification
function error($msg)
{
  echo '<script>$.bootstrapGrowl("'.$msg.'",{type:"error"});</script>';
}

//success notification
function success($msg)
{
  echo '<script>$.bootstrapGrowl("'.$msg.'",{type:"success"});</script>';
}

//info notification
function info($msg)
{
  echo '<script>$.bootstrapGrowl("'.$msg.'",{type:"info"});</script>';
}


//current url
$url=$_SERVER['PHP_SELF'];

//set error handler
set_error_handler("customError");

//error handler function
function customError($errno, $errstr)
  {
  error($errstr);
  }


//to logout
if (isset($_GET['logout'])) {
session_start();
session_destroy();
}

//insert data into table
function insert($col,$val,$table)
{
$sql="INSERT INTO $table($col)VALUES($val)";
if (!mysql_query($sql))
  {
  return false;
  }
  else
return true;
}
//time ago
function prettyDate($date){
	$time = strtotime($date);
	$now = time();
	$ago = $now - $time;
	if($ago < 60){
		$when = round($ago);
		$s = ($when == 1)?"second":"seconds";
		return "$when $s";
	}elseif($ago < 3600){
		$when = round($ago / 60);
		$m = ($when == 1)?"minute":"minutes";
		return "$when $m";
	}elseif($ago >= 3600 && $ago < 86400){
		$when = round($ago / 60 / 60);
		$h = ($when == 1)?"hour":"hours";
		return "$when $h";
	}elseif($ago >= 86400 && $ago < 2629743.83){
		$when = round($ago / 60 / 60 / 24);
		$d = ($when == 1)?"day":"days";
		return "$when $d";
	}elseif($ago >= 2629743.83 && $ago < 31556926){
		$when = round($ago / 60 / 60 / 24 / 30.4375);
		$m = ($when == 1)?"month":"months";
		return "$when $m";
	}else{
		$when = round($ago / 60 / 60 / 24 / 365);
		$y = ($when == 1)?"year":"years";
		return "$when $y";
	}
}



?>
