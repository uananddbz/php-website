<?php require_once('config.php'); ?>
<style>
.b { border: 2px dotted black; }
.r { border: 2px dotted red; }
</style>

<script type="text/javascript">
$(document).ready(function(){

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
   c=$(this).parents(".r");
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
      <?php
$tbl='contacts';
$id=$_SESSION["id"];
?>
      <div class="not"></div>
    <div class="contacts">
      <?php
//to display contacts

$sql="SELECT * FROM $tbl WHERE id='$id'";
$result=mysql_query($sql);
    $count = mysql_num_rows($result);
	if ($count) {
	  echo '<table class="table table-bordered table-striped"><thead><tr><th colspan="3"><a class="btn btn-block btn-large btn-danger da t" title="Delete all contacts">Delete all</a></th></tr></thead><tbody id="selectable">';
	    $n='1';
while($row = mysql_fetch_array($result))
  {
	echo '<tr class="r"><td><strong>'.$n.'.</strong> '.$row['name'].'</td><td>'.$row['number'].'</td><td><button data-placement="right" title="Delete" class="btn btn-inverse ds" value="'.$row['index'].'"> <i class="icon-trash icon-white"></i></button></td></tr>';
	  $n++;
  }
  	echo '</tbody></table>';
  }
  else 
  echo '<p class="muted">no contacts</p>';
?>
</div>
