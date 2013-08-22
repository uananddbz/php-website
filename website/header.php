<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php if(isset($title))	echo $title."-"; ?>
uananddbz</title>
<?php require_once('headtag.php'); ?>
<script type="text/javascript">

$(document).ready(function(){


		  <?php if(isset($_SESSION['username']))
require_once('js/user-script.php');
?>

});

</script>

</head>
<body>
<div class="page-wrap">
<div class="navbar">
  <div class="navbar-inner  my-nav"> <a class="brand" href="index.php">UANANDDBZ</a>
    <?php if(isset($nav))echo $nav; else {require_once('nav.php');} ?>
  </div>
</div>
<?php if (isset($check)) echo $check; ?>
