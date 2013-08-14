<?php
$title='Login';
$nav='<ul class="nav pull-right"><li class="active"><a>Please enter your username and password</a></li></ul>';
require_once('header.php');

$tbl_name='members';

if (isset($_GET['link'])){$link=$_GET['link'];}
if (isset($_POST['redirect'])){$redirect=$_POST['redirect'];}

if (isset($_SESSION['username'])) {
info('already login.');
}
else {
if (isset($_POST['username'])) {
// username and password sent from form 
$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
while($row = mysql_fetch_array($result))
  {
		$_SESSION['username'] = $myusername; //username
		$_SESSION['id']=$row['id']; //id of user
		$_SESSION['name']=$row['name']; //name of user
		$_SESSION['email']=$row['email']; //email of user
		$_SESSION['country']=$row['country']; //country of user
		$_SESSION['gender']=$row['gender']; //gender of user
		$_SESSION['dob']=$row['dob']; //user's date of birth
		if (isset($redirect)){
		header("location:$redirect");
		}
		else
		header("location:index.php");
  }
  }
  
  else
  
error('Wrong Username or Password');
}

}
?>
<form class="form-horizontal" action="<?=$_SERVER['PHP_SELF']?>" method="post">
  <div class="control-group">
    <label class="control-label" for="username">Username</label>
    <div class="controls">
	
      <?php
	if (isset($link))
	{
	echo '<input name="redirect" type="hidden" value="'.$link.'" />';
	}
	?>
	<?php
	if (isset($_GET['username'])) {
	echo '
	<input name="username" type="hidden" value="'.$_GET['username'].'" />
	<span class="input-xlarge uneditable-input">'.$_GET['username'].' <a class="pull-right" href="login.php"><i title="change username" class="icon-remove-circle"></i></a></span>';
	}
	else
echo  '<input type="text" name="username" id="username" placeholder="Username">';

?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password">
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>
<?php require_once('footer.php'); ?>
