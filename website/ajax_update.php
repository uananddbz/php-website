<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php
  
//to update profile via ajax
if (isset($_POST['name'])) {

$id=$_SESSION['id'];
$name=$_POST['name'];
$value=$_POST['value'];

mysql_query("UPDATE  `test`.`members` SET  `$name` =  '$value' WHERE  `members`.`id` ='$id';");

$_SESSION[$name]=$value;

echo $_POST['pk'];

mysql_close($con);
}
?>
