<?php
$data= $_GET['name'];

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("test", $con);

$result = mysql_query("SELECT username FROM members WHERE username= '$data' ");

$n= mysql_num_rows($result);

if ($n==0) {
echo 'true';
}

else
echo 'false';

?>
