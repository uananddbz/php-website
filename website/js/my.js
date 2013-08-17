 
  $(document).ready(function(){

//loading animation


					 
// for tooltip	
  $("body").on("mouseover","[title]",function(){
$(this).tooltip('show');
});


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
  $("body").on("mouseleave",".alert",function(){
$(this).fadeOut("slow");
});

//for nav

  $(".nav").on("click","a",function(){
$(this).toggleClass("active");
});  
  
  
});
