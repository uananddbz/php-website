(function($) {

    $.fn.nav = function(follow) {
  	
		
 $(follow).each(function(){
$(this).css({"position":"absolute","display":"inline-block","transition":"all 1s","z-index":"50"});

  });

		this.each(function(){
 $(this).children("li").children("a").each(function(){
$(this).css({"position":"relative","display":"block","transition":"all 1s","z-index":"100"});

  });

ac=$(this).children(".active")

pos=ac.offset();
pad=ac.css("padding");
w=ac.css("width");
h=ac.css("height");

$(follow).offset({top:pos.top,left:pos.left}).css({"padding":pad,"width":w,"height":h});

  });

this.children("li").children("a").click(function(){

  //for adding class active
  $(this).parent("li").parent("ul").children(".active").removeClass("active");
  $(this).parent("li").addClass("active");
  
  ac=$(this).parent("li").parent("ul").children(".active");
  
  //for moving f
pos=ac.offset();
pad=ac.css("padding");
w=ac.css("width");
h=ac.css("height");

$(follow).offset({top:pos.top,left:pos.left}).css({"padding":pad,"width":w,"height":h});

});

this.children("li").mouseenter(function(){
  ac=$(this);

  //for moving f
pos=ac.offset();
pad=ac.css("padding");
w=ac.css("width");
h=ac.css("height");

$(follow).offset({top:pos.top,left:pos.left}).css({"padding":pad,"width":w,"height":h});

});

this.children("li").mouseleave(function(){
  ac=$(this).parent("ul").children(".active");
  
  //for moving f
pos=ac.offset();
pad=ac.css("padding");
w=ac.css("width");
h=ac.css("height");

$(follow).offset({top:pos.top,left:pos.left}).css({"padding":pad,"width":w,"height":h});

});



    }

}(jQuery));
