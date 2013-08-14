 
  $(document).ready(function(){

//loading animation


					 
// for tooltip						 
  $("[title]").nav();



//for validate form with id 'check'
$("#check").validate({
 errorClass: "text-error"
});


//for validate forms with id 'check-bs'
$("#check-bs").validate({
errorPlacement: function(error, element) {
			 el =$(element);
			 pr=el.parents(".control-group");
		if (pr.hasClass("success"))
  {
pr.removeClass("success");
  }
pr.addClass("warning");
el.next(".help-inline").html(error);
			},	
			
success:  function(error, element) {
			 el =$(element);
			 pr=el.parents(".control-group");
			if (pr.hasClass("warning"))
  {
pr.removeClass("warning");
  }
pr.addClass("success");
el.next(".help-inline").html('<i class="icon-ok"></i>');
			}
			
			});
			
//for alerts
$(".alert").fadeOut(3000);

});
  
