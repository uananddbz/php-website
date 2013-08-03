<?php require_once('config.php'); ?>
 <?php
$tbl='contacts';
$id=$_SESSION["id"];

//to delete contact
if (isset($_GET['del'])) {
$d=$_GET['del'];
$sql="DELETE FROM $database.$tbl WHERE $tbl.`index` = $d;";
if (mysql_query($sql))
  {
echo 'true';
  }
  else
echo 'false';
}

//delete all
if (isset($_GET['da'])) {
if ($_GET['da']=='1') 
$sql="DELETE FROM $database.$tbl WHERE $tbl.`id` = $id;";
if (mysql_query($sql))
  {
echo 'true';
  }
  else
echo 'false';
}


?>
