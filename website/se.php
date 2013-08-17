<?php require_once('config.php'); ?>
<table class="table table-condensed table-hover table-bordered"><tbody>
<?php
$tbl_name='contacts';
$id=$_SESSION["id"];
$se=$_GET['se'];
$total=mysql_num_rows(mysql_query("SELECT * FROM $tbl_name WHERE id='$id' and fname LIKE '$se%'"));

$sql="SELECT * FROM $tbl_name WHERE id='$id' and fname LIKE '$se%' ORDER BY fname LIMIT 10";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
while($row = mysql_fetch_array($result))
  {
	echo '<tr><th>'.$row['fname'].' '.$row['lname'].'</th><td>'.$row['number'].'</td></tr>';
  }
  
  if ($total>5) {

  $rest =$total-5;
  $sql="SELECT * FROM $tbl_name WHERE id='$id' and fname LIKE '$se%' ORDER BY fname LIMIT 5,$rest";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
  {
	echo '<tr class="mc"><th>'.$row['fname'].' '.$row['lname'].'</th><td>'.$row['number'].'</td></tr>';
  }
  
  echo '<tr class="info"><td colspan="2"><a data=".mc" class="sm btn btn-link btn-mini btn-block">see more ('.$rest.')</a></td></tr>';
  }
  
  
  }
  else 
  echo '<tr class="warning"><td colspan="2">no contact found</td></tr>';
  

?>
</tbody></table>
