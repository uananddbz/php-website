

 $(".profile-nav").popover({
html:true,
content:'<table class="table table-condensed table-bordered"><tr><th scope="row">NAME:</th><td><?=$_SESSION['name'];?></td></tr><tr><th scope="row">EMAIL:</th><td><?=$_SESSION['email']?></td></tr><tr><th scope="row">COUNTRY:</th><td><?=$_SESSION['country']?></td></tr><tr><th scope="row">GENDER:</th><td><?=$_SESSION['gender']?></td></tr><tr><th scope="row">DATE OF BIRTH:</th><td><?=$_SESSION['dob']?><i data-placement="bottom" title="<?=prettyDate($_SESSION['dob'])?>" class="icon-info-sign"></i></td></tr></table>',
title:'profile'
});


 
$(".contact-nav").popover({
html:true,
content:'<div class="not"></div><form id="contact-form"><input type="hidden" name="id" value="<?=$_SESSION["id"];?>"><div class="row-fluid"><div class="span6"><input class="input-block-level" placeholder="first" type="text" name="fname" required></div><div class="span6"><input class="input-block-level" placeholder="last" type="text" name="lname" required></div></div><input class="input-block-level" placeholder="Number" type="tel" name="number" required><button class="btn btn-primary btn-block">Save</button></form><div style="overflow-y:auto;" class="result-contact"></div>',
title:'<div class="row-fluid"><div class="span8"><input class="se input-block-level search-query" placeholder="search" name="se" type="text" /></div><div class="span4"><div class="btn-group"><button data="#contact-form" class="btn btn-mini add-contact"><i  title="add" class="icon-plus" data-placement="bottom"></i></button><a href="edit-contacts.php" class="btn btn-mini"><i title="edit" class="icon-edit" data-placement="bottom"></i></a></div></div></div>'
});
$(".contact-nav").click(function() {
	mh=$("body").height();
	$(".result-contact").css("max-height",mh-200);							 
   $(".add-contact").hs();
   
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




    $("#contact-form").validate({
 errorClass: "text-error",
 submitHandler: function(form) {
			fname=$("[name='fname']").val();
			lname=$("[name='lname']").val();
			name=fname+' '+lname;
			num=$("[name='number']").val();
 data=$("#contact-form").serialize();
  $.post("ajax-insert.php",data,function(result){
  if (result=='true') {
	$.bootstrapGrowl("<b>contact</b>",{type:"success"});
	
 	form.reset();

	}
	
	else {
	alert('error');
	}
  });
			}
});


});

