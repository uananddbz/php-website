<?php $title='Guestbook';?>
<?php require_once('header.php'); ?>
<?php
$tbl='guestbook';

if (isset($_POST['id'])) {

$id=$_POST['id'];
$msg=$_POST['msg'];

if (isset($_POST['user'])) {

$name=$_POST['user'];
}

elseif (isset($_POST['guest'])) {
$name=$_POST['guest'].' (guest)';
}

if(insert ('id, name, msg',"'$id' , '$name' , '$msg'",$tbl)) {
success('message added.');
}
else
error(mysql_error());

}

?>
<div class="page-header">
  <h1>Guestbook <small>write your message</small></h1>
</div>
<div class="container">
  <div class="row-fluid">
    <div class="span2">
      <form id="check" action="#" method="post">
        <?php
 if (isset($_SESSION["id"])) 
 {echo '<input type="hidden" name="id" value="'.$_SESSION["id"].'" >

 <span title="User login" class="input-block-level uneditable-input t" ><i class="icon-user"></i> <strong>'.$_SESSION["name"].'</strong></span>
<input name="user" value="'.$_SESSION["name"].'" class="input-block-level" type="hidden">';}
else 
echo '<input type="hidden" name="id" value="null" >
<input id="name" name="guest" placeholder="Name" class="input-block-level" type="text" required>';

?>
        <textarea id="msg" name="msg" rows="5" placeholder="Message" class="input-block-level" required></textarea>
        <button class='btn btn-large btn-primary btn-block' type='submit'>POST</button>
      </form>
    </div>
    <div class="span10">
      <?php

$sql="SELECT * FROM $tbl";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
  if ($count) {

while($row = mysql_fetch_array($result))
  {
  $t=date("h:i d/m/y" , strtotime($row['time']));
  
		 echo '<blockquote><p>'.$row['msg'].'<span class="pull-right badge badge-info">'.$t.'</span></p><small>'.$row['name'].'</small></blockquote>';
  }
  

  
  }
  else 
  echo '<p class="muted">no messages</p>';

?>
    </div>
  </div>
</div>
<?php require_once('footer.php'); ?>
