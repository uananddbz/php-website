(function($) {

    $.fn.hs = function(re) {

this.each(function(){
				     data=$(this).attr("data");
					   cont=$(data);
					   cont.hide();
  $(this).click(function(){
data=$(this).attr("data");
  cont=$(data);
  el=$(this);
  $(cont).show("fast",function() {
        el.replaceWith(re);
  });
  return false;
  });
  
  });



    }

}(jQuery));
