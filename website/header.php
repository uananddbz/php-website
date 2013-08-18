<?php $title='Guestbook';?>
<?php require_once('header.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
$(".anim").hide();
$(".sd").slideDown(1000,function() {
});

$(".show-guest").hs(function() {
$(this).replaceWith("<button class='btn btn-primary btn-large btn-block' >POST</button>");
});

});
</script>

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
	  <div id="guest-input">
        <?php
 if (isset($_SESSION["id"])) 
 {echo '<input type="hidden" name="id" value="'.$_SESSION["id"].'" >

 <span title="User already login" class="input-block-level uneditable-input t" ><i class="icon-user"></i> <strong>'.$_SESSION["name"].'</strong></span>
<input name="user" value="'.$_SESSION["name"].'" class="input-block-level" type="hidden">';}
else 
echo '<input type="hidden" name="id" value="null" >
<input id="name" name="guest" placeholder="Name" class="input-block-level" type="text" required>';

?>
        <textarea id="msg" name="msg" rows="5" placeholder="Message" class="input-block-level" required></textarea>
		</div>
        <button data="#guest-input" class='btn btn-large btn-block show-guest' >WRITE</button>
      </form>
    </div>
    <div class="span10">
	<div class="anim sd">
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

?></div>
    </div>
  </div>
</div>
<?php require_once('footer.php'); ?>
