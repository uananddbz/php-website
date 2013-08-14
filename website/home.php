<?php $title='HOME';?>
<?php require_once('header.php'); ?>

<?php require_once('auth.php'); 
$tbl_name='contacts';
$id=$_SESSION["id"];

$sql="SELECT * FROM $tbl_name WHERE id='$id' ORDER BY name";
$result=mysql_query($sql);
if (mysql_num_rows($result)!="0")
    $count = mysql_num_rows($result);
?>

<div class="container">
	  
	  <a class="btn btn-block btn-large" href="contacts.php">Contacts <span class="badge badge-inverse"><?php if (isset($count)) {echo $count;}?></span></a>

</div>

<?php require_once('footer.php'); ?>
