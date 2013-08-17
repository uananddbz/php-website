<?php require_once('var.php'); ?>
<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>
<?php if(isset($title))	echo $title."-"; ?>
uananddbz</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php require_once('headtag.php'); ?>
<script type="text/javascript">
$(document).ready(function(){

 $("#loader").ajaxl("#target","<img src='img/ajax-loader.gif' alt='wait...'>");
 
 $(".profile-nav").popover({
html:true,
content:'<?php if(isset($_SESSION["id"]))  echo '<table class="table table-condensed table-bordered"><tr><th scope="row">NAME:</th><td>'.$_SESSION['name'].'</td></tr><tr><th scope="row">EMAIL:</th><td>'.$_SESSION['email'].'</td></tr><tr><th scope="row">COUNTRY:</th><td>'.$_SESSION['country'].'</td></tr><tr><th scope="row">GENDER:</th><td>'.$_SESSION['gender'].'</td></tr><tr><th scope="row">DATE OF BIRTH:</th><td>'.$_SESSION['dob'].'<i data-placement="bottom" title="'.prettyDate($_SESSION['dob']).'" class="icon-info-sign"></i></td></tr></table>'  ?>',
title:'profile'
});
 
 
$(".contact-nav").popover({
html:true,
content:'<div class="not"></div><form id="add-form" class="form-inline"><input type="hidden" name="id" value="<?php if(isset($_SESSION["id"])) echo $_SESSION["id"];?>"><div class="h"><div class="row-fluid"><div class="span6"><input class="input-block-level" placeholder="First-Name" type="text" name="fname" required></div><div class="span6"><input class="input-block-level" placeholder="Last-Name" type="text" name="lname" required></div></div><input class="input-block-level" placeholder="Number" type="tel" name="number" required><button class="btn btn-primary btn-block sub">Save</button></form></div><div class="result-contact"></div>',
title:'<div class="row-fluid"><div class="span7"><input class="se input-block-level search-query" placeholder="search" name="se" type="text" /></div><div class="span5"><button data-placement="bottom" title="add" data=".h" class="btn btn-mini sub show-f"><i class="icon-plus"></i></button><a data-placement="bottom" title="edit" href="edit-contacts.php" class="btn btn-mini"><i class="icon-edit"></i></a></div></div>'
});
$(".contact-nav").click(function() {
$("input.se").keyup(function(){
data=$(this).val();
if (data!="") {
$.get("se.php",{se:data} , function(result){
    $(".result-contact").html(result);
	$(".sm").hs(function() {
	$(this).parent("td").parent("tr").remove();
	});
  });

  }
});

  $(".show-f").hs(function() {

});



    $("#add-form").validate({
 errorClass: "text-error",
 submitHandler: function(form) {
			fname=$("[name='fname']").val();
			lname=$("[name='lname']").val();
			name=fname+' '+lname;
			num=$("[name='number']").val();
 data=$("#add-form").serialize();
  $.post("ajax-insert.php",data,function(result){
  if (result=='true') {
	$(".not").prepend("<div class='alert alert-success'>Contact added!</div>");
 	form.reset();

	}
	
	else {
	alert('error');
	}
  });
			}
});


});



});
</script>
</head>
<body>
<div class="page-wrap">
<div class="navbar">
  <div class="navbar-inner  my-nav">
 <a class="brand" href="index.php">UANANDDBZ</a>
        <?php if(isset($nav))echo $nav; else {require_once('nav.php');} ?>
  </div>
</div>
<?php if (isset($check)) echo $check; ?>
