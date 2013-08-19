<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php

  
//to update contact
if (isset($_POST['name'])) {

$id=$_SESSION['id'];
$name=$_POST['name'];
$value=$_POST['value'];
$index=$_POST['pk'];

mysql_query("UPDATE  `test`.`contacts` SET  `$name` =  '$value' WHERE  `contacts`.`index` ='$index';");

}
?>
