<?php require_once('config.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
  
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
	$(".new").prepend("<dl id='new' style='background-color:orange;' class='dl-horizontal'><dt>"+name+"</dt><dd>"+num+"</dd></dl>");
	$("#new").animate({backgroundColor: '#fff'}, 1000);
	}
	
	else {
	alert('error');
	}
  });
			}
});


});
</script>

<form id="add-form" class="form-inline">
  <input type="hidden" name="id" value="<?=$_SESSION["id"];?>">
  <div class="row-fluid">
  <div class="span3">
    <input class="input-block-level" placeholder="First-Name" type="text" name="fname" required>
  </div>
  <div class="span3">
    <input class="input-block-level" placeholder="Last-Name" type="text" name="lname" required>
  </div>
  <div class="span3">
    <input class="input-block-level" placeholder="Number" type="tel" name="number" required>
  </div>
  <div class="span3">
    <button class="btn btn-primary sub">Save</button>
  </div>
</form>
</div>
<div class="new"></div>
