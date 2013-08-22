<!DOCTYPE html>
<html>
<head>
<title>error</title>
<script src="js/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
$(".anim").hide();
$("h1").show("shake","slow",function() {
$(".hero-unit").show("bounce","slow",function() {
$(".btn").fadeIn("slow");


});
});

$("a").click(function() {
$("a").fadeOut("slow",function() {
$(".hero-unit").hide("bounce","slow",function() {
$("h1").hide("drop","slow",function() {
location.replace("index.php");
});
});
});
return false;
});

});

</script>
</head>
<body>
<div class="container">
<div class="page-header">
  <h1 class="anim" style="color:#b94a48;">ERROR <small> - 404</small></h1>
</div>
<div class="row-fluid">


	<div class="span10">
<div class="hero-unit anim" style="background:#fdd;">
  <h2>Page not found</h2>
  <b>may be the page you are trying to load - </b>
  <ul>
  <li>has removed from this server</li>
  <li>has not created yet</li>
  </ul>
</div>
</div>

<div class="span2">
    <a href="index.php" class="anim btn btn-block btn-danger btn-large"><i class="icon-home icon-white"></i> HOME</a>
	</div>

	
	</div>
	</div>
	
</body></html>
