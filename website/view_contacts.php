<?php require_once('config.php'); ?>

<?php
$tbl_name='contacts';
$id=$_SESSION["id"];

$sql="SELECT * FROM $tbl_name WHERE id='$id' ORDER BY name";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
  if ($count) {

while($row = mysql_fetch_array($result))
  {
	echo '<dl class="dl-horizontal"><dt>'.$row['name'].'</dt><dd>'.$row['number'].'</dd></dl>';
  }
  

  
  }
  else 
  echo '<p class="muted">no contacts</p>';
?>
