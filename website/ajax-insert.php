<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php

$tbl='notes';
  
//to add contact
if (isset($_POST['name'])) {

$id=$_SESSION['id'];
$name=$_POST['name'];
$content=$_POST['content'];

if (insert ('id, name, content',"'$id' , '$name' , '$content'",$tbl)) {
echo 'true';}

else
echo 'false';
}
?>
