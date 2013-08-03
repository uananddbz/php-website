<?php require_once("header.php"); ?>

<div class="container">
    <div class="hero-unit">
  
	  <h1>Welcome</h1>
	  <?php
	  if (isset($_SESSION["id"])) {
	  echo $_SESSION["name"];
	  }
	  else 
echo	'<div class="row-fluid">
		  	<div class="span4"><p>This is a very simple site made by utkarsh anand.<br/>
	  	  <a class="btn btn-large btn-primary pull-right" href="register.php"> Register </a></p>
	  </div>
	<div class="span8">

<h3>Features</h3>
      <p>
	  <ul>
	  <li>Login system</li>
	  <li>contacts list with add/remove</li>
	  <li>guestbook</li>
	  </ul></p></div>

	  </div>';
	  
	  ?>
	  </div>
	  
	  <a href="guestbook.php" class="btn btn-link pull-right">Guestbook</a><br/>
 </div>

<?php require_once("footer.php"); ?>
