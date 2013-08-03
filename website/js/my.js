 
  $(document).ready(function(){
  						 
// for tooltip						 
  function tol()
{
  $("[title]").mouseover(function(){
$(this).tooltip('show');
  });
}

tol();

//ajax load navbar and body

$(".ajax-load").each(function(){
nav=$(this).children(".nav");
but=nav.children("a");
bod=$(this).children(".bod");;
con=bod.children(".con");

f=nav.children("a.active").attr("href");
     $(con).load(f, function(response, status, xhr){
    if(status == "error") {
    $(this).html(xhr.status + " " + xhr.statusText);
  }
  
});


$(but).click(function () {
el=$(this);
link=$(this).attr("href");
bod=el.parent(".nav").parent(".ajax-load").children(".bod");;
con=bod.children(".con");

if (el.hasClass("active")) {}

else {
 $(bod).slideUp("fast", function(){
 el.parent(".nav").children(".active").removeClass("active");
el.addClass("active");
  $(con).load(link, function(response, status, xhr){
    if(status == "error") {
    $(con).html(xhr.status + " " + xhr.statusText);
  }
  $(bod).slideDown("fast",function(){
    $(con).fadeTo("normal",1);
  });

});
});

}
return false;
});

});

//ajax load navbar for bootstrap
$(".ajax-load-bs").each(function(){
nav=$(this).children(".nav");
but=nav.children("li").children("a");
bod=$(this).children(".bod");
con=bod.children(".con");

f=nav.children("li.active").children("a").attr("href");
     $(con).load(f, function(response, status, xhr){
    if(status == "error") {
    $(this).html(xhr.status + " " + xhr.statusText);
  }
  
});


$(but).click(function () {
el=$(this);
link=$(this).attr("href");
bod=el.parent("li").parent(".nav").parent(".ajax-load-bs").children(".bod");
con=bod.children(".con");

if (el.parent("li").hasClass("active")) {}

else {
 $(bod).slideUp("fast", function(){
 el.parent("li").parent(".nav").children(".active").removeClass("active");
el.parent("li").addClass("active");
  $(con).load(link, function(response, status, xhr){
    if(status == "error") {
    $(con).html(xhr.status + " " + xhr.statusText);
  }
  $(bod).slideDown("fast");

});
});

}
return false;
});

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
			},
			rules: {
				username: "username",
			}
			
			});
			
//for alerts
$(".alert").fadeOut(3000);

});
  
