<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php
$data= $_GET['username'];
$back= $_GET['link'];
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

$result = mysql_query("SELECT username FROM members WHERE username= '$data' ");

$n= mysql_num_rows($result);

if ($n==0) {
header("location:register.php?link=".$back."&username=".$data);
}

else
header("location:login.php?link=".$back."&username=".$data);


?>
