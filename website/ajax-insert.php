<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php

$tbl='contacts';
  
//to add contact
if (isset($_POST['id'])) {

$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$number=$_POST['number'];

if (insert ('id, fname, lname, number',"'$id' , '$fname' , '$lname' , '$number'",$tbl)) {
echo 'true';}

else
echo 'false';
}
?>
