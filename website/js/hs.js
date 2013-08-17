(function($) {

    $.fn.hs = function(callback) {

this.each(function(){
				     data=$(this).attr("data");
					   cont=$(data);
					   cont.hide();
  $(this).click(function(){


data=$(this).attr("data");
  cont=$(data);
  el=$(this);
  $(cont).toggle("fast");
  if (callback != 'undefined') {
          callback.call(this);	 
  }

  return false;
  });
  

  
  });



    }

}(jQuery));
