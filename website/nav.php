		  <?php if(isset($_SESSION['username'])){
$tbl_name='notes';
$id=$_SESSION["id"];

$sql="SELECT * FROM $tbl_name WHERE id='$id' ORDER BY name";
$result=mysql_query($sql);
    $count_note = mysql_num_rows($result);
echo '

  <ul class="nav">
  <li>
            <a href="#" data-placement="bottom" class="note-nav" data-toggle="popover">Notes <span class="badge badge-inverse">'.$count_note.'</span></a></li>
  </ul>
  <ul class="nav pull-right">
  <li><a data-placement="bottom" title="Profile" href="profile.php"><i class="icon-user icon-white"></i></a></li>
  <li><a href="'.$url.'?logout=1" title="logout" data-placement="bottom"><i class="icon-off icon-white"></i></a></li></ul>';
}
else 
echo '
<script>
$(document).ready(function(){
$(".show-username").hs(function() {
$(this).replaceWith("<button class=btn type=submit>Login/Register</button>");
});
});
</script>
<form class="navbar-form pull-right" action="check.php" method="GET">
<input type="hidden" name="link" value="'.$url.'" />
<div class="input-prepend input-append">
<span class="add-on"><i class="icon-user"></i></span>
<input placeholder="username" type="text" name="username" id="username" class="input-small" required>
  <button data="#username" class="btn show-username">Login/Register</button></div>
</form>
';


?>

