<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php if(isset($title))  echo $title."-"; ?>
uananddbz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once('headtag.php'); ?>
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container"> <a class="brand" href="index.php">UANANDDBZ</a>
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <div class="nav-collapse collapse">
        <?php if(isset($nav))echo $nav; ?>
        <ul class="nav pull-right">
          <?php if(isset($_SESSION['username'])){
echo '
	<li><a href="contacts.php">Contacts</a></li>
	  	    <li class="divider-vertical"></li>
<li class="dropdown">
  <a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="caret"></i></a>
  <ul class="dropdown-menu"><li class="nav-header"><strong>'.$_SESSION['username'].'</strong></li>
  <li class="divider"></li>
  <li><a href="profile.php"><i class="icon-user"></i> profile</a></li><li><a href="'.$url.'?logout=1"><i class="icon-off"></i> Logout</a></li></ul></li>';
}
elseif (isset($_GET['link'])) {
echo '<li class="active"><a><b>Please enter your username and password.</b></a></li>';
}
else {
echo '<li><a href="login.php?link='.$url.'" data-toggle="modal">Login</a></li>';
} 

?>
        </ul>
      </div>
    </div>
  </div>
</div>
<?php if (isset($check)) echo $check; ?>
