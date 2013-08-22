<?php
$title='edit-notes';
$nav='<ul class="nav pull-right"><li class="active"><a>Click on detail you want to edit</a></li></ul>';
 require_once('header.php'); ?>
<?php require_once('auth.php'); ?>
<script type="text/javascript">
$(document).ready(function(){

$.fn.editable.defaults.emptytext = 'not set';
$.fn.editable.defaults.url = 'ajax_note.php';
$.fn.editable.defaults.placement = 'right';
$.fn.editable.defaults.showbuttons = false;
$.fn.editable.defaults.onblur = 'submit';
$.fn.editable.defaults.highlight = false;
$.fn.editable.defaults.type = 'text';
$.fn.editable.defaults.error = function(response, newValue) {
$.bootstrapGrowl("<h4>error ("+response.status+")</h4><p>"+response.statusText+"</p>",{type:"error"})
};
$.fn.editable.defaults.success = function(response, newValue) {
$(this).parent("td").effect("highlight","slow");
};

$('#edit a').editable();


r={ to: ".icon-trash", className: "r" };
b={ to: ".icon-trash", className: "b" };
  $(".da").click(function(){
  
 $.ajax({url:"ajax_del.php?da=1", success:function(){
     $(".all-notes").effect( 'transfer',r, 'slow',function() {
	  $.bootstrapGrowl("<h4>All notes deleted!</h4>",{type:"success"});
	      $(".all-notes").fadeOut("fast");
	 });

  },error:function(xhr,status,error){
    alert("An error occured: " + xhr.status + " " + xhr.statusText);
  }
  
  });
  
  
  });
  
   $(".ds").click(function(){
   c=$(this).parents("td").parents("tr");
   txt=$(this).val();
   
    $.ajax({url:"ajax_del.php",data:{del:txt},type:"GET", success:function(){
  c.effect( 'transfer',b, 'normal');
  c.fadeOut("slow");
  },error:function(xhr,status,error){
    alert("An error occured: " + xhr.status + " " + xhr.statusText);
  }
  
  });

  
  

  });
  
  


  
  
});
</script>
<style>
.b { border: 2px dotted black; }
.r { border: 2px dotted red; }
</style>
<div class="container-fluid">
  <div class="page-header">
    <h1><a class="btn btn-large" href="note.php"><i class="icon-arrow-left"></i> back</a></h1>
  </div>
  <?php
$tbl='notes';
$id=$_SESSION["id"];
?>
  <div class="all-notes">
    <?php
//to display contacts

$sql="SELECT * FROM $tbl WHERE id='$id' ORDER BY  $tbl.`name` ASC";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
	  echo '<table class="table table-bordered table-hover"><thead><tr><th>NAME</th><th>Desciption</th><th><a class="btn btn-block btn-danger da t" title="Delete all notes"><i class="icon-trash icon-white"></i> Empty</a></th></tr></thead><tbody class="new">';
while($row = mysql_fetch_array($result))
  {
	echo '<tr id="edit"><td><a class="btn btn-link btn-block" data-name="name" data-pk="'.$row['index'].'">'.$row['name'].'</a></td><td><a class="btn btn-link btn-block" data-showbuttons="bottom" data-name="content" data-type="textarea" data-pk="'.$row['index'].'">'.$row['content'].'</a></td><td><button data-placement="left" title="Delete" class="btn btn-inverse ds" value="'.$row['index'].'"> <i class="icon-remove icon-white"></i></button></td></tr>';
  }
  	echo '</tbody></table>';
  }
  else 
  echo '<p class="muted">no notes</p>';
?>
  </div>
</div>
<?php require_once('footer.php'); ?>
