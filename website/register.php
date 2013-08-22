<?php $title='REGISTER';?>
<?php
$nav='<ul class="nav pull-right"><li class="active"><a>Please fill all details below</a></li></ul>';
 require_once("header.php"); ?>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker').datetimepicker({
pickTime: false
    });
  });
</script>

<?php
if (isset($_GET['link'])){$link=$_GET['link'];}
if (isset($_POST['redirect'])){$redirect=$_POST['redirect'];}

if (isset($_POST['username'])) {
// username and password sent from form 
$username=$_POST['username'];
$password=$_POST['password']; 
$name=$_POST['name'];
$email=$_POST['email'];
$country=$_POST['country'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$tbl="members";

//check username and other fields before register
$sql="SELECT * FROM $tbl WHERE username='$username'";
$result=mysql_query($sql);
    $row = mysql_num_rows($result);

if($row || empty($username) || empty($password)){

if($row){
error("<strong>Username</strong> already exist.");
}
if(empty($username)){
error("<strong>Username</strong> can't empty.");
}
if(empty($password)){
error("<strong>password</strong> can't empty.");
}

}
else {
insert ('username, password, name, email, country ,gender ,dob',"'$username' , '$password' , '$name', '$email', '$country' ,'$gender' ,'$dob'",$tbl);
		if (isset($redirect)){
header("location:login.php?link=".$redirect."&username=".$username);
		}
		else
header("location:login.php?username=".$username);

}

}

?>
<form id="check-bs" class="form-horizontal" action="<?=$_SERVER['PHP_SELF']?>" method='post'>
      <?php
	if (isset($link))
	{
	echo '<input name="redirect" type="hidden" value="'.$link.'" />';
	}
	?>
  <div class="control-group">
    <label class="control-label" for="user">Username</label>
    <div class="controls">
	<?php
	if (isset($_GET['username'])) {
	echo '
	<input name="username" type="hidden" value="'.$_GET['username'].'" />
	<span class="input-xlarge uneditable-input">'.$_GET['username'].' <a class="pull-right" href="register.php"><i title="change username" class="icon-remove-circle"></i></a></span>';
	}
	else {
echo  '
      <input type="text" name="username" value="" placeholder="Username" required>
';
}

?>
	  <span class="help-inline"></span>
	  </div>
  </div>
  
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password" required>
	  <span class="help-inline"></span>
    </div>
  </div>
  
    <div class="control-group">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
      <input type="text" value="" name="name" id="name" placeholder="Name"> 
	  <span class="help-inline"></span>
    </div>
  </div>
  
   <div class="control-group">
    <label class="control-label" for="dob" placeholder="yyyy-mm-dd">Date of birth</label>
    <div class="controls">
<div id="datetimepicker" class="input-append">
    <input id="dob" class="input-small" placeholder="YYYY-MM-DD" name="dob" data-format="yyyy-MM-dd" type="text"></input>
    <span class="add-on">
      <i data-time-icon="icon-time" data-date-icon="icon-calendar">
      </i>
    </span>
  </div>
    </div>
  </div>
  
    <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="email" name="email" value="" id="email" placeholder="email">
	  <span class="help-inline"></span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="country">Country</label>
    <div class="controls">
      <input type="text" name="country" value="" id="country" placeholder="Country"> 
	  <span class="help-inline"></span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="gender">Gender</label>
    <div class="controls">
<input type="hidden" checked="checked" value="" name="gender">
			<label  class="radio inline" for="gender_male">
				<input type="radio" id="gender_male" value="male" name="gender">
				Male
			</label>
			<label  class="radio inline" for="gender_female">
				<input type="radio" id="gender_female" value="female" name="gender">
				Female
			</label>

    </div>
  </div>
   
<div class="control-group">
<div class="controls">
      <button type="submit" class="btn btn-primary">Register</button>
	  </div>
  </div>
</form>
<?php require_once("footer.php"); ?>
