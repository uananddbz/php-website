<?php require_once("header.php"); ?>

<div class="container">
	  <?php
	  if (isset($_SESSION["id"])) {
header("location:home.php");
	  }
?>
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
