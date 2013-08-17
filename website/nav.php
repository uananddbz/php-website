		  <?php if(isset($_SESSION['username'])){
$id=$_SESSION["id"];
$totalc=mysql_num_rows(mysql_query("SELECT * FROM contacts WHERE id='$id'"));
echo '

  <ul class="nav">
  <li>
            <a href="#" data-placement="bottom" class="contact-nav" data-toggle="popover">Contacts <span class="badge badge-inverse">'.$totalc.'</span></a></li>
  <li><a data-placement="bottom" class="profile-nav" data-toggle="popover" href="#"><i class="icon-user icon-white"></i></a></li></ul>
  <ul class="nav pull-right">
  <li><a href="'.$url.'?logout=1" title="logout" data-placement="bottom"><i class="icon-off icon-white"></i></a></li></ul>';
}
else {
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
} 

?>

