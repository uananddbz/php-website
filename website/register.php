<?php require_once("header.php"); ?>

<script type="text/javascript">
$(document).ready(function(){

//for checking username
  $.validator.addMethod("username", function(value, element) {
el =$(element);
			 pr=el.parents(".control-group");
$.get("check_username.php",{name:value}, function(result){
if (result=='true') {
 r=true;
		if (pr.hasClass("info"))
  {
pr.removeClass("info");
  }
pr.addClass("success");
}

else {
r=false;
		if (pr.hasClass("success"))
  {
pr.removeClass("success");
  }
pr.addClass("info");
}
  });
return r;
	}, 'username already exist!'	
	
	);


});
</script>

<?php
if (isset($_POST['username'])) {
// username and password sent from form 
$username=$_POST['username'];
$password=$_POST['password']; 
$name=$_POST['name'];
$email=$_POST['email'];
$country=$_POST['country'];
$gender=$_POST['gender'];
$d=$_POST['d'];
$m=$_POST['m'];
$y=$_POST['y'];
$tbl="members";

//check username and other fields before register
$sql="SELECT * FROM $tbl WHERE username='$username'";
$result=mysql_query($sql);
    $row = mysql_num_rows($result);

if($row || empty($username) || empty($password) || empty($name) || empty($email) || empty($country) || $gender=="gender" || $d=="date" || $m=="month" || $y=="year"  ){
$check="<div class='alert alert-error alert-block'><ul>";
if($row){
$check.="<li><strong>Username</strong> already exist.</li>";
}
if($d=="date" || $m=="month" || $y=="year"){
$check.="<li>check your <strong>date of birth</strong>.</li>";
}

$check.="</ul></div>";
}
else {
$dob=$y.'-'.$m.'-'.$d;
insert ('username, password, name, email, country ,gender ,dob',"'$username' , '$password' , '$name', '$email', '$country' ,'$gender' ,'$dob'",$tbl);
$check="<div class='alert alert-success'>success</div>";

}

echo $check;
}

?>
<form id="check-bs" class="form-horizontal" action="<?=$_SERVER['PHP_SELF']?>" method='post'>
  <div class="control-group">
    <label class="control-label" for="user">Username</label>
    <div class="controls">
      <input type="text" name="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>" id="user" placeholder="Username" required="required">
	  <span class="help-inline"></span>
	  </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="name">Name</label>
    <div class="controls">
      <input type="text" value="<?php if(isset($_POST['name'])){echo $_POST['name'];} ?>" name="name" id="name" placeholder="Name" required> 
	  <span class="help-inline"></span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="email">Email</label>
    <div class="controls">
      <input type="email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>" id="email" placeholder="email" required>
	  <span class="help-inline"></span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="country">Country</label>
    <div class="controls">
      <input type="text" name="country" value="<?php if(isset($_POST['country'])){echo $_POST['country'];} ?>" id="country" placeholder="Country" required> 
	  <span class="help-inline"></span>
    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="gender">Gender</label>
    <div class="controls">

			<label  class="radio inline" for="gender_male">
				<input type="radio" checked="checked" id="gender_male" value="male" name="gender">
				Male
			</label>
			<label  class="radio inline" for="gender_female">
				<input type="radio" id="gender_female" value="female" name="gender" required="required">
				Female
			</label>

    </div>
  </div>
    <div class="control-group">
    <label class="control-label" for="dob" placeholder="yyyy-mm-dd">Date of birth</label>
    <div class="controls">
<select  class="span2" name="d">
<option selected="selected">date</option>
<?php
for ($i=1; $i<=9; $i++)
  {
  if ($d==$i) {
  echo "<option selected='selected'>$i</option>";}
  else
  echo"<option>$i</option>";
  }
  for ($i=10; $i<=31; $i++)
  {
  if ($d==$i) {
  echo "<option selected='selected'>$i</option>";}
  else
  echo"<option>$i</option>";
  }
?>

</select>
<select  class="span2" name="m">
<option selected="selected">month</option>
<?php
for ($i=1; $i<=9; $i++)
  {
  if ($m==$i) {
  echo "<option selected='selected'>$i</option>";}
  else
  echo"<option>$i</option>";
  }
  for ($i=10; $i<=12; $i++)
  {
  if ($m==$i) {
  echo "<option selected='selected'>$i</option>";}
  else
  echo"<option>$i</option>";
  }
?>

</select>
<select class="span2" name="y">
<option selected="selected">year</option>
<?php
for ($i=1980; $i<=2009; $i++)
  {
  if ($y==$i) {
  echo "<option selected='selected'>$i</option>";}
  else
  echo"<option>$i</option>";
  }
?>
</select>
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
<div class="controls">
      <button type="submit" class="btn btn-primary">Register</button>
	  </div>
  </div>
</form>
<?php require_once("footer.php"); ?>
