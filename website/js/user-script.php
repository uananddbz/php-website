
$(".note-nav").popover({
html:true,
content:'<div class="not"></div><div style="overflow-y:auto;" class="search-note-result"></div>',
title:'<input class="search-note span2 search-query" placeholder="search" name="se" type="text" />'
});
$(".note-nav").click(function() {					 

$("input.search-note").keyup(function(){
data=$(this).val();
if (data!="") {
$.get("ajax_search.php",{se:data} , function(result){
    $(".search-note-result").html(result);
	$(".see-more").hs(function() {
	$(this).hide();
	});
  });

  }
});

});


