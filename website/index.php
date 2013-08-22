<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<?php
	  if (isset($_SESSION["username"])) {
header("location:home.php");
	  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once('headtag.php'); ?>
</head>
<body>
<div class="page-wrap">


<div class="container">
<div class="page-header">
  <h1 style="color:#4096ee">UANANDDBZ <small>make simple live better</small></h1>
</div>

    <?php if(isset($nav))echo $nav; else {require_once('nav.php');} ?>

    <div class="hero-unit bg-none">
<h1>Features</h1>
	  <ul>
	  <li>Login system</li>
	  <li>contacts list with add/remove</li>
	  <li>guestbook</li>
	  </ul>
	  <p class="lead">This is a very simple site made by utkarsh anand.</p>
</div>




 </div>
<?php require_once("footer.php"); ?>
