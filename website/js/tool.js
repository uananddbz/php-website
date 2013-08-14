(function($) {

    $.fn.nav = function(follow) {
		this.each(function(){
  $(this).mouseover(function(){
$(this).tooltip('show');
  });
  });
    }

}(jQuery));
