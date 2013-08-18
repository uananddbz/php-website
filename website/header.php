<?php $title='Edit guestbook';?>
<?php require_once('header.php'); ?>

<div class="container-fluid">
<div class="page-header">
  <h1>Guestbook <small>edit</small></h1>
  </div>

<div class="row-fluid">
<div class="span1">
  <a class="btn t" title="back" data-placement="right" href="guestbook.php"><i class="icon-chevron-left"></i></a>
  <br/><br/>
  </div>
  <div class="span11">
  
  <?php
$tbl='guestbook';

//delete all
if (isset($_GET['da'])) {
if ($_GET['da']=='1') 
$sql="TRUNCATE $tbl";
if (!mysql_query($sql))
  {
$msg= 'Error: ' . mysql_error();
  }
  else
error('All Contact deleted !');
}

//to delete contact
if (isset($_GET['del'])) {
$d=$_GET['del'];
$sql="DELETE FROM $database.$tbl WHERE $tbl.`index` = $d;";
if (!mysql_query($sql))
  {
$msg= 'Error: ' . mysql_error();
  }
  else
info('Contact deleted !');
}


//to display alert message
  if (isset($msg)) echo $msg;

?>


<?php
//to display contacts

$sql="SELECT * FROM $tbl";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
	  echo '<table class="table table-bordered table-striped"><thead><tr><th colspan="3"><a class="btn btn-block btn-large btn-danger t" title="Delete all contacts." href="'.$url.'?da=1">Delete all ('.$count.')</a></th></tr></thead><tbody id="selectable">';
	    $n='1';
while($row = mysql_fetch_array($result))
  {
	echo '<tr><td><strong>'.$n.'.</strong> '.$row['msg'].'</td><td>'.$row['name'].'</td><td><a data-placement="right" title="Delete" class="btn btn-inverse t" href="'.$url.'?del='.$row['index'].'"> <i class="icon-trash icon-white"></i></a></td></tr>';
	  $n++;
  }
  	echo '</tbody></table>';
  }
  else 
  echo '<p class="muted">no contacts</p>';
?>
</div>
</div></div>
<?php require_once('footer.php'); ?>
