<?php
$server = "localhost";  // server to connect to.
$db_user = "root";  // mysql username to access the database with.
$db_pass = "";  // mysql password to access the database with.
$database = "test";  // the name of the database.
$con = mysql_connect($server, $db_user, $db_pass);
$sel=mysql_select_db($database,$con);
session_start();
?>
