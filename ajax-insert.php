<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php

$tbl='contacts';
  
//to add contact
if (isset($_POST['id'])) {

$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$name=$fname.' '.$lname;
$number=$_POST['number'];

if (insert ('id, name, number',"'$id' , '$name' , '$number'",$tbl)) {
echo 'true';}

else
echo 'false';
}
?>
