		  <?php if(isset($_SESSION['username'])){
echo '

  <ul class="nav pull-right">
  <li><a data-placement="bottom" title="'.$_SESSION['username'].'" href="profile.php"><i class="icon-user icon-white"></i></a></li><li><a href="'.$url.'?logout=1" title="logout" data-placement="bottom"><i class="icon-off icon-white"></i></a></li></ul>';
}
else {
echo '
<script>
$(document).ready(function(){
$(".show-username").hs("  <button class=btn type=submit>Login/Register</button>");
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
} 

?>

