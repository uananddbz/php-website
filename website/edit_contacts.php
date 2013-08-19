<?php
$title='edit-contacts';
$nav='<ul class="nav pull-right"><li class="active"><a>Click on detail you want to edit</a></li></ul>';
 require_once('header.php'); ?>
<?php require_once('auth.php'); ?>
<script type="text/javascript">
$(document).ready(function(){

$.fn.editable.defaults.emptytext = 'not set';
$.fn.editable.defaults.url = 'ajax_cont.php';
$.fn.editable.defaults.placement = 'right';
$.fn.editable.defaults.showbuttons = false;
$.fn.editable.defaults.onblur = 'submit';
$.fn.editable.defaults.highlight = false;
$.fn.editable.defaults.type = 'text';
$.fn.editable.defaults.error = function(response, newValue) {
$.bootstrapGrowl("<h4>error ("+response.status+")</h4><p>"+response.statusText+"</p>",{type:"error"})
};
$.fn.editable.defaults.success = function(response, newValue) {
$(this).parent("td").parent("tr").addClass("warning",setTimeout(function() {
				$(".warning").removeClass("warning");
			}, 1000 ));



$.bootstrapGrowl("Contact updated!",{type:"info"})
};

$('#edit a').editable();


r={ to: ".icon-trash", className: "r" };
b={ to: ".icon-trash", className: "b" };
  $(".da").click(function(){
  
 $.ajax({url:"ajax_del.php?da=1", success:function(){
     $(".contacts").effect( 'transfer',r, 'slow');
     $(".contacts").fadeOut("fast");
  },error:function(xhr,status,error){
    alert("An error occured: " + xhr.status + " " + xhr.statusText);
  }
  
  });
  
  
  });
  
   $(".ds").click(function(){
   c=$(this).parents("#edit");
   txt=$(this).val();
   
    $.ajax({url:"ajax_del.php",data:{del:txt},type:"GET", success:function(){
  c.effect( 'transfer',b, 'normal');
  c.fadeOut("fast");
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
    <h1>Contacts - edit<small> or delete</small></h1>
  </div>
  <?php
$tbl='contacts';
$id=$_SESSION["id"];
?>
  <div class="contacts">
    <?php
//to display contacts

$sql="SELECT * FROM $tbl WHERE id='$id'";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
	  echo '<table class="table table-bordered table-hover"><thead><tr><th>First-name</th><th>Last-name</th><th>Number</th><th><a class="btn btn-block btn-danger da t" title="Delete all contacts"><i class="icon-trash icon-white"></i> Empty</a></th></tr></thead><tbody class="new">';
while($row = mysql_fetch_array($result))
  {
	echo '<tr id="edit"><td><a class="btn btn-link btn-block" data-name="fname" data-pk="'.$row['index'].'">'.$row['fname'].'</a></td><td><a class="btn btn-link btn-block" data-name="lname" data-pk="'.$row['index'].'">'.$row['lname'].'</a></td><td><a class="btn btn-link btn-block" data-pk="'.$row['index'].'" data-name="number">'.$row['number'].'</a></td><td><button data-placement="right" title="Delete" class="btn btn-inverse ds" value="'.$row['index'].'"> <i class="icon-remove icon-white"></i></button></td></tr>';
  }
  	echo '</tbody></table>';
  }
  else 
  echo '<p class="muted">no contacts</p>';
?>
  </div>
</div>
<?php require_once('footer.php'); ?>
