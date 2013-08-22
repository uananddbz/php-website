(function($) {

    $.fn.hs = function(callback) {

this.each(function(){
				     data=$(this).attr("data-target");
					   cont=$(data);
					   cont.hide();
  $(this).click(function(){


data=$(this).attr("data-target");
  cont=$(data);
  el=$(this);
  effect=$(this).attr("data-effect");
  
if (effect==undefined || effect=='') {
	$(cont).toggle("slow");

}

else {
$(cont).toggle(effect,"slow");	
}
  
  if ($.isFunction(callback)) {
          callback.call(this);	 
  }

  return false;
  });
  

  
  });



    }

}(jQuery));
