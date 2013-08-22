<?php require_once('config.php'); ?>
<table class="table table-bordered table-hover">
<?php
$tbl_name='notes';
$id=$_SESSION["id"];
$se=$_GET['se'];
$total=mysql_num_rows(mysql_query("SELECT * FROM $tbl_name WHERE id='$id' and name LIKE '$se%'"));

$sql="SELECT * FROM $tbl_name WHERE id='$id' and name LIKE '$se%' ORDER BY name LIMIT 10";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
while($row = mysql_fetch_array($result))
  {
	echo '<tr><td><a title="'.$row['date'].'" class="btn btn-link btn-mini btn-block" href="note.php?index='.$row['index'].'"><strong>'.$row['name'].'</strong></a></td></tr>';
  }
  
  if ($total>10) {
  $rest=$total-10;
  echo '<tr class="info"><td><a class="btn btn-link btn-mini btn-block" href="search.php?q='.$se.'">see more ('.$rest.')</a></td></tr>';
  }

  }
  else {
  echo '<tr class="warning"><td>no result</td></tr>';
  }

?>
</table>
