(function($) {

    $.fn.ajaxl = function(target,wait) {	



this.each(function(){

$(target).html("<div class='loading'></div><div class='con'></div>");
loading=$(target).children(".loading");
$(loading).html(wait).hide();
con=$(target).children(".con");

link=$(this).children(".active").children("a").attr("href");

$(con).load(link, function(response, status, xhr){
    if(status == "error") {
    $(this).html(xhr.status + " " + xhr.statusText);
  }
  });


  });


this.children("li").children("a").click(function(){

if ($(this).parent("li").hasClass("active")) {}

else {

  //for adding class active
  $(this).parent("li").parent("ul").children(".active").removeClass("active");
  $(this).parent("li").addClass("active");

link=$(this).attr("href");


$(con).toggle("fast",function(){
$(loading).toggle("fast");
$(this).load(link, function(response, status, xhr){
    if(status == "error") {
    $(this).html(xhr.status + " " + xhr.statusText);
  }
  $(loading).toggle("fast",function(){
	  $(con).toggle("fast");								
  });
  });
  });



}


return false;
  });


    }

}(jQuery));
